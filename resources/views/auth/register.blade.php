<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <link rel="shortcut icon" href="{{asset('image/icon.png')}}" type="image/x-icon">
    <title>Register</title>
</head>
<body>
    <div class="container mt-2">
        <div class="row justify-content-center align-items-center text-center p-2">
            <div class="m-1 col-sm-8 col-md-6 col-lg-4 shadow-sm p-3 mb-5 bg-white border rounded">
                <div class="pt-5 pb-5">
                    <img src={{asset('image/icon.png')}} alt="logo" class="img-fluid" width="100" height="150">
                    <p class="text-center text-uppercase mt-3">Register</p>
                    <form class="form text-center" action="{{route('auth.register.post')}}" method="POST">
                        @csrf
                        <div class="form-group input-group-md">
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <!--<div class="invalid-feedback">
                                Errors in email during form validation, also add .is-invalid class to the input fields
                            </div> -->
                        </div>
                        <div class="form-group input-group-md">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <!--<div class="invalid-feedback">
                                Errors in password during form validation, also add .is-invalid class to the input fields
                            </div> -->
                        </div>
                        <button class="btn btn-lg btn-block btn-primary mt-4" type="submit">
                            Login
                        </button> 
                    </form>
                </div>
                <a href="{{route('auth.login.get')}}" class="text-center d-block mt-2">Already have account? </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/auth/login.js') }}"></script>
    <script src="{{ asset('js/common/errors.js') }}"></script>
</body>
</html>