<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    <style>
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #111;
        }
        </style>
</head>
<body>
    <ul>
        <li><a class="active" href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('create.admin') }}">Register Admin</a></li>
        <li><a href="{{ route('create.guest') }}">Register Guest</a></li>
      </ul>
    <table>
        <thead>
            <td>Creater Name</td>
            <td>Blog title</td>
            <td>Blog Pictures</td>
            <td>Blog description</td>
        </thead>
        <tbody>
            @foreach ($blog as $b )
            <tr>
                <td>
                    <a href=" {{ route('show.blogs', ['id' => $b->admin->id]) }}">{{ $b->admin->name }}</a>
                </td>
                <td> {{ $b->title }}</td>
                <td>
                    <img src="{{ asset('assets/upload/blog/'.$b->file)}}" width="400px" height="100px" alt="image">

                </td>

                <td> {{ $b->text }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
