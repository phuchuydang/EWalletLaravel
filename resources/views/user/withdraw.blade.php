@extends('layouts.app')
@section('title', 'Withdraw')
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
            <form id="withdraw-form" action="{{route('user.buyCard.post')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Card Number</label>
                    <input value="{{old('card_number')}}" type="text" name="card_number" data-label="Card Number" class="form-control" id="card_number">
                    <small id="invalid-feedback-card_number" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="card_exp">Card Expertation </label>
                    <input value="{{old('card_exp')}}" type="date" name="card_exp" data-label="Card Expertation" class="form-control" id="card_exp">
                    <small id="invalid-feedback-expire_date" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="card_cvv">Card CVV </label>
                    <input value="{{old('card_cvv')}}" type="text" name="card_cvv" data-label="Card CVV" class="form-control" id="card_cvv">
                    <small id="invalid-feedback-cvv" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="money">Money</label>
                    <input value="{{old('money')}}" type="text" name="money" data-label="Money" class="form-control" id="money">
                    <small id="invalid-feedback-money" class="form-text text-muted"></small>
                </div>
                <button type="submit" id="btn-withdraw" class="btn btn-primary">Buy</button>
                <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
        <div class="col-12 col-lg-6">
            <h2>Withdraw</h2>
            <img src="{{asset('image/withdraw.webp')}}" alt="" width="300" height="300"  />
        </div>
    </div>
</div>
<br>
<br>
<script src="{{ asset('js/user/withdraw.js') }}"></script>
@endsection