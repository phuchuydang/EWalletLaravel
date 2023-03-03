<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\WalletRepositoryInterface;
use App\Interfaces\PhoneCardRepositoryInterface;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmailBuyCard;

class WalletController extends Controller
{
    private WalletRepositoryInterface $walletRepository;
    private PhoneCardRepositoryInterface $phoneCardRepository;

    public function __construct(WalletRepositoryInterface $walletRepository, PhoneCardRepositoryInterface $phoneCardRepository)
    {
        $this->walletRepository = $walletRepository;
        $this->phoneCardRepository = $phoneCardRepository;
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
        dd($data);
    }
}
