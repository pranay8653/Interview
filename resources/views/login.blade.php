<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login.user') }}" class="sign-up-form" method="post">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error  )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif

         <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div><br>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div><br>

           <button type="submit" >
            Login
        </button>
</body>
</html>
