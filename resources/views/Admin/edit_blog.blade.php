<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('update.blog', ['id' =>$blog->id ]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="admin_id"> Name</label>
            <select name="admin_id" class="form-control" >
                @foreach ($data as $b )
                <option value="{{ $b->id }}"{{ $b->id == $blog->admin_id  ? 'selected' : '' }}>{{ $b->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="title"> Title</label>
            <input type="text" name="title" value="{{ $blog->title }}">
        </div>
        <div>
            <label for="text"> Title</label>
            <input type="text" name="text" value="{{ $blog->text }}">
        </div>
        {{-- <div>
            <label for="file">Blog picture</label>
            <input type="file" name="file" value="{{ $blog->file }}">
         </div><br> --}}
         <button type="submit"> Update</button>
    </form>
</body>
</html>
