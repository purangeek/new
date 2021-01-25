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
                <h2>User Registration Page</h2>
                <hr>
                <form action="{{ route('auth.create') }}" method="POST">
                    @csrf
                    <div class="results">
                        @if(Session::get('success'))
                            <div class="alert alert-success">
                            {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                            <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Last Name</label>
                            <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="gender">Gender</label><br>
                            <input type="radio" id="male" name="gender" value="male" @if((old('gender')) != '') {{ old('gender') == "male" ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == "female" ? 'checked' : '' }}>
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="other" {{ old('gender') == "other" ? 'checked' : '' }}>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St" value="{{ old('inputAddress') }}">
                        <span class="text-danger">@error('inputAddress') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="inputCountry">Coutry</label>
                        <select id="inputCountry" name="inputCountry" class="form-control">
                            <option value="" {{ old('inputCountry') == "" ? 'selected' : '' }}>Choose...</option>
                            <option value="usa" {{ old('inputCountry') == "usa" ? 'selected' : '' }}>USA</option>
                            <option value="uk" {{ old('inputCountry') == "uk" ? 'selected' : '' }}>UK</option>
                            <option value="india" {{ old('inputCountry') == "india" ? 'selected' : '' }}>India</option>
                        </select>
                        <span class="text-danger">@error('inputCountry') {{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <br>
                <a href="{{ url('login') }}">Login to site</a>
            </div>
        </div>
    </div>
</body>
</html>