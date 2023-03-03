@extends('layouts.app')
@section('title', 'Deposit Money')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                @if (session('error'))
                <br />
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                <br />
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="deposit-form" action="{{route('user.deposit.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input value="{{old('card_number')}}" type="number" name="card_number" data-label="Card Number" class="form-control" id="card_number">
                        <small id="invalid-feedback-card_number" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="expire_date">Card Expiration</label>
                        <input value="{{old('expire_date')}}" type="date" name="expire_date" data-label="Card Expiration" class="form-control" id="expire_date">
                        <small id="invalid-feedback-expire_date" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="cvv">Card CVV</label>
                        <input value="{{old('cvv')}}" type="number" name="cvv" data-label="Card CVV" class="form-control" id="cvv">
                        <small id="invalid-feedback-cvv" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input value="{{old('amount')}}" type="number" name="amount" data-label="Amount" class="form-control" id="amount">
                        <small id="invalid-feedback-amount" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" id="btn-deposit" class="btn btn-primary">Deposit</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <h2>Card Value</h2>
                <img src="{{asset('image/cardvalue.png')}}" alt="" width="300" height="300"  />
            </div>
        </div>
    </div>
    <br>
    <br>
    <script src="{{ asset('js/user/deposit.js') }}"></script>
@endsection