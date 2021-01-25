<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Application</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="margin-top:50px">
                <h2>User Login Page</h2>
                <hr>
                <form action="{{ Route('auth.check') }}" method="POST">
                @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <br>
                <a href="{{ url('register') }}">Create an Account Now</a>
            </div>
        </div>
    </div>
</body>
</html>