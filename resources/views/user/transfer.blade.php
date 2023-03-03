@extends('layouts.app')
@section('title', 'Transfer Money')
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
            <form id="transfer-form" action="{{route('user.transfer.post')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="phone">Phone Number </label>
                    <input value="{{old('phone')}}" type="text" name="phone" data-label="Phone Number" class="form-control" id="phone">
                    <small id="invalid-feedback-phone" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="money">Money</label>
                    <input value="{{old('money')}}" type="number" name="money" data-label="Money" class="form-control" id="money">
                    <small id="invalid-feedback-money" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="money">Note (Optional)</label>
                    <textarea value="{{old('note')}}" cols="5" rows="5" style="resize: none;"  name="note" data-label="Note" class="form-control" id="note"></textarea>
                    <small id="invalid-feedback-note" class="form-text text-muted"></small>
                </div>
                <button type="submit" id="btn-withdraw" class="btn btn-primary">Transfer Money</button>
                <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
        <div class="col-12 col-lg-6">
            <h2>Transfer Money</h2>
            <img src="{{asset('image/transfer.jpg')}}" alt="" width="300" height="300"  />
        </div>
    </div>
</div>
<br>
<br>
<script src="{{ asset('js/user/transfer.js') }}"></script>
@endsection