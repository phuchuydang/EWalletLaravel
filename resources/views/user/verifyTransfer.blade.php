@extends('layouts.app')
@section('title', 'Verify Transfer Money')
@section('content')
<div class="container">
    {{ Breadcrumbs::render() }}
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
            <form id="verifyTransfer-form" action="{{route('user.transfer.post')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input value="{{old('otp')}}" type="text" name="otp" data-label="OTP" class="form-control" id="otp">
                    <small id="invalid-feedback-otp" class="form-text text-muted"></small>
                </div>
                <button type="submit" id="btn-withdraw" class="btn btn-primary">Transfer Money</button>
                <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
        <div class="col-12 col-lg-6">
            <h2>Verify Transfer Money</h2>
            <img src="{{asset('image/transfer.jpg')}}" alt="" width="300" height="300"  />
        </div>
    </div>
</div>
<br>
<br>
<script src="{{ asset('js/user/verifyTransfer.js') }}"></script>
@endsection