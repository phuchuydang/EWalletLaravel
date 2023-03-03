@extends('layouts.app')
@section('title', 'User Profile')
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
                <form id="profile-form" action="{{route('user.profile.update')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input value="{{$user->email ?? ''}}" type="text" name="email" data-label="Email" class="form-control">
                            <small id="invalid-feedback-email" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">User Name</label>
                            <input value="{{$user->username ?? ''}}" disabled type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input value="{{$user->address ?? ''}}" type="text" name="address" data-label="Address" class="form-control" id="inputAddress">
                        <small id="invalid-feedback-address" class="form-text text-muted"></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Full Name</label>
                            <input value="{{$user->fullname ?? ''}}" type="text" name="fullname" data-label="Full Name" class="form-control">
                            <small id="invalid-feedback-fullname" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Birthday</label>
                            <input value="{{$user->birthday ?? ''}}" name="birthday" data-label="Birthday" type="date" class="form-control" id="inputBirthday">
                            <small id="invalid-feedback-birthday" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Front of the identity card</label>
                            <input  name="fcard" data-label="Front of the identity card" value="{{old('fcard')}}" class="form-control" type="file" accept="image/*" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Back of the identity card</label>
                            <input name="bcard" data-label="Back of the identity card" value="{{old('bcard')}}" class="form-control" type="file" accept="image/*" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" data-label="Password" class="form-control" placeholder="">
                        <div style="float: left;" id="invalid-feedback-password"></div>
                    </div>
                    <div class="form-group">
                        <label for="cconf_password">Password Confirmation </label>
                        <input type="password" id="conf_password" name="conf_password" class="form-control" data-label="Password Confirmation" id="inputAddress" placeholder="">
                        <div style="float: left;" id="invalid-feedback-conf_password"></div>
                    </div>
                    <button type="submit" id="btn-update" class="btn btn-primary">Update</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Front of the identity card</label>
                        <img src="{{ asset('storage/uploads/identity_card/' . $user->first_identity_card) ?? ''}}" width="300" height="300" alt="" class="img-fluid">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Back of the identity card</label>
                        <img src="{{ asset('storage/uploads/identity_card/' . $user->second_identity_card) ?? '' }}" width="300" height="300" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-12">
                    <h2>Your Wallet</h2>
                    <h5>Total money: {{$user->wallet->balance}} VNĐ </h5>
                    <img src="{{asset('image/atm.png')}}" width="400" height="100">
                </div>
            </div>
            
        </div>
    </div>
    <br>
    <br>
    <script src="{{ asset('js/user/profile.js') }}"></script>
@endsection