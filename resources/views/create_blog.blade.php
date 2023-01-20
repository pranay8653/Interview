<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
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
        <label for="title">Blog title</label>
        <input type="text" name="title">
     </div><br>
     <div>
        <label for="file">Blog picture</label>
        <input type="file" name="file">
     </div><br>
     <div>
        <label for="text">Blog Description</label>
        <input type="text" name="text">
     </div><br>
     <div>
        <label for="admin_id">Admin name</label>
        <select name="admin_id">
            @foreach ($data as  $d )
            <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
     </div><br><br>

     <div>
        <input type="submit">
     </div>
    </form>
</body>
</html>
