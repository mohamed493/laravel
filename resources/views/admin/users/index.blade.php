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
@if(Session::has('deleted_user'))
  <p class='bg-danger'>{{Session('deleted_user')}}</p>

@endif
<div class="container">
  <h2>Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>created</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src='/hacking/public/images/{{$user->photo['file']}}' class="img-fluid"></td>
       <td><a href="{{route('admin.users.edit' ,$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active ==0 ? "Non active" :"Active"}}</td>
        <td>{{$user->created_at}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>

</body>
</html>
