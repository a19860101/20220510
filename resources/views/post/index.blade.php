<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POST INDEX</h1>
    <a href="/post/create">create</a>
    <a href="{{route('post.create')}}">create</a>

    <?php
        $id = 88;
    ?>
    <a href="/post/1">post 1</a>
    <a href="/post/{{$id}}">post 55</a>
    <a href="{{route('post.show',['post'=>66])}}">post 66</a>
</body>
</html>
