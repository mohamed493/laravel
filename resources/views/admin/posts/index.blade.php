@extends('layouts.admin')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
          <th>user</th>
          <th>Category</th>
          <th>Photo</th>
        <th>title</th>
        <th>body</th>
          <th>Created_at</th>
          <th>Updated_at</th>
      </tr>
    </thead>
    <tbody>
    @if($posts)
        @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
          <td>{{$post->user->name}}</td>
{{--          <td>{{$post->category['name']}}</td>--}}
        <td>{{$post->category->name}}</td>
        <td><img height="50" src='/hacking/public/images/{{$post->photo['file']}}' class="img-fluid"></td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
      </tr>
        @endforeach
    @endif

    </tbody>
  </table>
</div>

</body>
</html>
@stop