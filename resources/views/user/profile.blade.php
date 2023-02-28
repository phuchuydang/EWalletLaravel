@extends('layouts.app')
@section('title', 'Profile')
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
                <form action="{{route('user.profile.update')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input value="{{$user->email ?? ''}}" type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">User Name</label>
                            <input value="{{$user->username ?? ''}}" disabled type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input value="{{$user->address ?? ''}}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Full Name</label>
                            <input value="{{$user->fullname ?? ''}}" type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Birthday</label>
                            <input value="{{$user->birthday ?? ''}}" type="date" class="form-control" id="inputBirthday" placeholder="1234 Main St">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Front of the identity card</label>
                            <input  name="fcard" data-label="Front of the identity card" value="{{old('fcard')}}" class="form-control" type="file" accept="image/*" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Back of the identity card</label>
                            <input name="bcard" data-label="Back of the identity card" value="{{old('bcard')}}" class="form-control" type="file" accept="image/*" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Password</label>
                        <input type="password" class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Password Confirmation </label>
                        <input type="password" class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Front of the identity card</label>
                        <img src="{{ asset('storage/code_312901045517818.png') }}" alt="" class="img-fluid" width="200" height="300">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Back of the identity card</label>
                        <img src="{{asset('storage/images/').'/back.jpg'}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection