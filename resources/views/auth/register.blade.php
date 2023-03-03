<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
		<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" crossorigin="anonymous"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" />
        <script src="{{ asset('js/common/errors.js') }}"></script>
		<link rel="shortcut icon" href="{{asset('image/icon.png')}}" type="image/x-icon" />
		<title>Sign Up</title>
	</head>
	<body>
		<div class="container">
			<br />
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<header class="card-header">
							<h4 class="card-title mt-2">Sign up</h4>
						</header>
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
						<article class="card-body">
							<form id="register-form" action="{{ route('auth.register.post') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
								<div class="form-group">
									<label>Email address</label>
									<input type="text" name="email" value="{{old('email')}}" data-label="Email" class="form-control" placeholder="" />
									<small id="invalid-feedback-email" class="form-text text-muted"></small>
								</div>
                                <div class="form-row">
									<div class="col form-group">
										<label>Full Name </label>
										<input type="text" class="form-control" value="{{old('fullname')}}" name="fullname" data-label="Full Name" placeholder="" />
                                        <small id="invalid-feedback-fullname" class="form-text text-muted"></small>
									</div>
									<div class="col form-group">
										<label>Phone Number</label>
										<input type="text" name="phone" value="{{old('phone')}}" data-label="Phone Number" class="form-control" placeholder=" " />
                                        <small id="invalid-feedback-phone" class="form-text text-muted"></small>
									</div>
								</div>
                                <div class="form-row">
									<div class="col form-group">
										<label>Birthday </label>
										<input type="date" name="birthday" value="{{old('birthday')}}" data-label="Birthday" class="form-control" placeholder="" />
                                        <small id="invalid-feedback-birthday" class="form-text text-muted"></small>
									</div>
									<div class="col form-group">
										<label>Address</label>
										<input type="text" name="address" value="{{old('address')}}" data-label="Address" class="form-control" placeholder=" " />
                                        <small id="invalid-feedback-address" class="form-text text-muted"></small>
									</div>
								</div>
								<div class="form-group">
									<label>Front of the identity card</label>
									<input name="fcard" data-label="Front of the identity card" value="{{old('fcard')}}" class="form-control" type="file" accept="image/*" />
                                    <small id="invalid-feedback-fcard" class="form-text text-muted"></small>
								</div>
                                <div class="form-group">
									<label>Back of the identity card</label>
									<input name="bcard" data-label="Back of the identity card" value="{{old('bcard')}}" class="form-control" type="file" accept="image/*" />
                                    <small id="invalid-feedback-bcard" class="form-text text-muted"></small>
								</div>
								<div class="form-group">
									<button type="submit" id="btn-register" name="btn-register" class="btn btn-primary btn-block">Register</button>
								</div>
								<small class="text-muted">
									By clicking the 'Sign Up' button, you confirm that you accept our <br />
									Terms of use and Privacy Policy.
								</small>
							</form>
						</article>
						<div class="border-top card-body text-center">Have an account? <a href="{{ route('auth.login.get') }}">Log In</a></div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('js/auth/register.js') }}"></script>
	</body>
</html>
