@extends('layouts.app')
@section('title', 'Buy Phone Card')
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
                <form id="buyCard-form" action="{{route('user.buyCard.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Card Type</label>
                        <select class="form-control" id="cardtype" data-label="Card Type" name="cardtype">
                            <option value="" selected >Choose...!</option>
                            @php 
                                $card = $phone['card'];
                                $denomination = $phone['denomination'];
                            @endphp
                            @foreach ($card as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <small id="invalid-feedback-card_type" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="amount">Card Amount</label>
                        <input value="{{old('amount')}}" type="number" name="amount" data-label="Card Amount" class="form-control" id="amount">
                        <small id="invalid-feedback-amount" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="denomination">Card Denomination</label>
                        <select class="form-control" id="card_denomination" name="card_denomination" data-label="Card Denomination">
                            <option selected value="" >Choose...!</option>
                            @foreach ($denomination as $key => $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                        </select>
                        <small id="invalid-feedback-denomination" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" id="btn-buy" class="btn btn-primary">Buy</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <h2>Card Value</h2>
                <img src="{{asset('image/card_price.png')}}" alt="" width="300" height="300"  />
            </div>
        </div>
    </div>
    <br>
    <br>
    <script src="{{ asset('js/user/buycard.js') }}"></script>
@endsection