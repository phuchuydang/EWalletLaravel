<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\WalletRepositoryInterface;
use App\Interfaces\PhoneCardRepositoryInterface;
use App\Interfaces\WithdrawRepositoryInterface;
use App\Interfaces\AccountRepositoryInterface;
use App\Interfaces\OTPRepositoryInterface;
use App\Interfaces\HistoryRepositoryInterface;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendMailOTP;
use App\Jobs\SendEmailBuyCard;
class WalletController extends Controller
{
    private WalletRepositoryInterface $walletRepository;
    private PhoneCardRepositoryInterface $phoneCardRepository;
    private WithdrawRepositoryInterface $withdrawRepository;
    private AccountRepositoryInterface $accountRepository;
    private OTPRepositoryInterface $otpRepository;
    private HistoryRepositoryInterface $historyRepository;

    public function __construct(WalletRepositoryInterface $walletRepository, PhoneCardRepositoryInterface $phoneCardRepository, WithdrawRepositoryInterface $withdrawRepository, AccountRepositoryInterface $accountRepository, OTPRepositoryInterface $otpRepository, HistoryRepositoryInterface $historyRepository)
    {
        $this->walletRepository = $walletRepository;
        $this->phoneCardRepository = $phoneCardRepository;
        $this->withdrawRepository = $withdrawRepository;
        $this->accountRepository = $accountRepository;
        $this->otpRepository = $otpRepository;
        $this->historyRepository = $historyRepository;
    }

    public function index()
    {
        return view('user.deposit');
    }

    public function handleDeposit(Request $request)
    {
        $data = $request->all();
        $card = config('constant.card');
        $data['expire_date'] = date('d/m/Y', strtotime($data['expire_date']));
        if ($data['card_number'] != $card['card1']['cardnumber'] && $data['card_number'] != $card['card2']['cardnumber'] && $data['card_number'] != $card['card3']['cardnumber']) {
            $messageECL006 = config('constant.messages.error.ECL006');
            Session()->flash('error', $messageECL006);
            return redirect()->back()->withInput();
        }
        foreach ($card as $key => $value) {
            if ($data['card_number'] == $value['cardnumber']) {
                if ($data['expire_date'] != $value['expiration']) {
                    $messageECL007a = config('constant.messages.error.ECL007a');
                    Session()->flash('error', $messageECL007a);
                    return redirect()->back()->withInput();
                }
                if ($data['cvv'] != $value['CVV']) {
                    $messageECL007b = config('constant.messages.error.ECL007b');
                    Session()->flash('error', $messageECL007b);
                    return redirect()->back()->withInput();
                }
            }
        }
        if ($data['card_number'] == $card['card2']['cardnumber']) {
            if ($data['amount'] > 1000000) {
                $messageECL008 = config('constant.messages.error.ECL008');
                Session()->flash('error', $messageECL008);
                return redirect()->back()->withInput();
            }
        } 
        if ($data['card_number'] == $card['card3']['cardnumber']) {
            $messageECL009 = config('constant.messages.error.ECL009');
            Session()->flash('error', $messageECL009);
            return redirect()->back()->withInput();
        }
        if($this->walletRepository->deposit($data['amount'], Auth::user()->id) == true){
            $messageSCL003 = config('constant.messages.success.SCL003');
            Session()->flash('success', $messageSCL003);
            return redirect()->back();
        } else {
            $messageECL010 = config('constant.messages.error.ECL010');
            Session()->flash('error', $messageECL010);
            return redirect()->back()->withInput();
        }
    }

    public function buyCard()
    {
        $phone = config('constant.phone');

        return view('user.buyCard')->with('phone', $phone);
    }

    public function handleBuyCard(Request $request)
    {
        $data = $request->all();
        $phone = config('constant.phone');
        $data['user_id'] = Auth::user()->id;
        $result = $this->phoneCardRepository->buyCard($data);
        if ( $result == false) {
            $messageECL011 = config('constant.messages.error.ECL011');
            Session()->flash('error', $messageECL011);
            return redirect()->back()->withInput();
        } else {
            $card = [];
            foreach ($result as $key => $value) {
                $card[$key]['card_number'] = $value->card_number;
                $card[$key]['card_serial'] = $value->card_serial;
            }
            $bought = array (
                'email' => Auth::user()->email,
                'username' => Auth::user()->username,
                'card' => $card,
            );
            // dd($bought);
            $job = (new SendEmailBuyCard($bought))->delay(now()->addSeconds(5));
            dispatch($job);
            $messageSCL004 = config('constant.messages.success.SCL004');
            Session()->flash('success', $messageSCL004);
            return redirect()->back();
        }
    }

    public function withdraw()
    {
        return view('user.withdraw');
    }

    public function handleWithdraw(Request $request)
    {
        $data = $request->all();
        $card = config('constant.card');
        //convert date to dd/mm/yyyy
        $data['card_exp'] = date('d/m/Y', strtotime($data['card_exp']));
        if ($data['card_number'] != $card['card1']['cardnumber']) {
            $messageECL012 = config('constant.messages.error.ECL012');
            Session()->flash('error', $messageECL012);
            return redirect()->back()->withInput();
        } 
        if ($data['card_number'] == $card['card1']['cardnumber']) {
            if ($data['card_exp'] != $card['card1']['expiration']) {
                $messageECL013 = config('constant.messages.error.ECL013');
                Session()->flash('error', $messageECL013);
                return redirect()->back()->withInput();
            }
            if ($data['card_cvv'] != $card['card1']['CVV']) {
                $messageECL013 = config('constant.messages.error.ECL013');
                Session()->flash('error', $messageECL013);
                return redirect()->back()->withInput();
            }
            $wallet = $this->walletRepository->getWalletByUserId(Auth::user()->id);
            if ($wallet->balance < $data['money']) {
                $messageECL014 = config('constant.messages.error.ECL014');
                Session()->flash('error', $messageECL014);
                return redirect()->back()->withInput();
            } else {
                $withdraw = $this->withdrawRepository->withdraw(Auth::user()->id, $data);
                if ($withdraw == false) {
                    $messageECL015 = config('constant.messages.error.ECL015');
                    Session()->flash('error', $messageECL015);
                    return redirect()->back()->withInput();
                } else {
                    $messageSCL005 = config('constant.messages.success.SCL005');
                    Session()->flash('success', $messageSCL005);
                    return redirect()->back();
                }
            }     
        }
    }

    public function transfer()
    {
        return view('user.transfer');
    }

    public function handleTransfer(Request $request)
    {
        $data = $request->all();
        $data['sender_id'] = Auth::user()->id;
        //find phone number in database
        $user = $this->accountRepository->getUserByPhone($data['phone']);
        $data['receiver_id'] = $user['id'];
        // dd($data['receiver_id']  . $data['sender_id']);
        if (!$user) {
            $messageECL016 = config('constant.messages.error.ECL016');
            Session()->flash('error', $messageECL016);
            return redirect()->back()->withInput();
        }  else {
            $wallet = $this->walletRepository->getWalletByUserId(Auth::user()->id);
            if ($wallet->balance < $data['money']) {
                $messageECL014 = config('constant.messages.error.ECL014');
                Session()->flash('error', $messageECL014);
                return redirect()->back()->withInput();
            } else {
                //create opt with 6 digits
                $data['otp'] = rand(100000, 999999);
                //insert opt to database
                $this->otpRepository->createOTP($data);
                //send mail
                $bought = array (
                    'email' => Auth::user()->email,
                    'username' => Auth::user()->username,
                    'otp' => $data['otp'],
                );
                $job = (new SendMailOTP($bought))->delay(now()->addSeconds(5));
                dispatch($job);
                return redirect()->route('user.transfer.verify.get');
            }
        }
    }

    public function verifyTransfer()
    {
        $user_id = Auth::user()->id;
        return view('user.verifyTransfer')->with('user_id', $user_id);
    }

    public function handleVerifyTransfer(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $otp = $this->otpRepository->getOTPByUserId($data['user_id']);  
        if ($otp->otp != $data['otp']) {
            $messageECL017 = config('constant.messages.error.ECL017');
            Session()->flash('error', $messageECL017);
            return redirect()->back()->withInput();
        } else {
            $inforTransfer = $this->otpRepository->getInforTransfer($data['user_id']);
            $data['sender_id'] = $inforTransfer->sender_id;
            $data['receiver_id'] = $inforTransfer->receiver_id;
            $transfer = $this->walletRepository->transfer($data);
            if ($transfer == false) {
                $messageECL018 = config('constant.messages.error.ECL018');
                Session()->flash('error', $messageECL018);
                return redirect()->back()->withInput();
            } else {
                $messageSCL006 = config('constant.messages.success.SCL006');
                Session()->flash('success', $messageSCL006);
                return redirect()->back();
            }
        }
    }

    public function history()
    {
        $user_id = Auth::user()->id;
        $history = $this->historyRepository->getHistoryByUserId($user_id);
        return view('user.history')->with('history', $history);
    }
}
