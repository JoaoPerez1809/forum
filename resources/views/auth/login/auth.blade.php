<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginaa</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
  crossorigin="anonymous" 
  referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" id="name" name="name" placeholder="User name" value = "{{old ('name')}}" required="">
                <input type="email" id="email" name="email" placeholder="E-mail" value = "{{old ('email')}}" required="">
                @error('email') <span>{{ $message }}</span> @enderror
                <input type="password" id="password" name="password" placeholder="Password" value = "{{old ('password')}}" required="">
                @error('password') <span>{{ $message }}</span> @enderror
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required="">
                <button>Sign up</button>
            </form>

        </div>
        <div class="login">
            <form action="{{ route('login')}}" method="POST">
            @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required="">
                @error('email') <span>{{$message}}</span> @enderror
                <input type="password" id="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
</body>
</html>
