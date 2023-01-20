
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="{{ route('guest.register.data') }}" method="POST">
        @csrf
        <h1>Guest User Registration</h1>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div><br>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div><br>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div><br>
        <input type="submit">
    </form>
</body>
</html>
