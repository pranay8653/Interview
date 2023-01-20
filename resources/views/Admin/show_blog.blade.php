<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <td>Creater Name</td>
            <td>Blog title</td>
            <td>Blog Pictures</td>
            <td>Blog description</td>
            <td>Actons</td>
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
                <td><a href="{{ route('edit.blog',['id'=>$b->id ])}}"> Edit</td>
                <td><a href="{{ route('delete.blog',['id'=>$b->id ])}}"> Delete</td>
            </tr>
            @endforeach
        </tbody>
        <button><a href="{{ route('create.blog') }}">Add more Bloges</button>
            <br>
            <br>
        <button><a href="{{ route('logout') }}">Logout</button>
    </table>
</body>
</html>
