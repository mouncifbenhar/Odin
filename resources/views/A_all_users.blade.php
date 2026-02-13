<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All_the_users</h1>
  @forelse ($all_uses as $user)
      <p>{{$user->name}} <br> {{$user->email}} <h3>{{$user->is_active}}</h3></p>
    
             @if(!$user->is_active)
              <form action="/manage_user/{{$user->id}}" method="POST">
                 @csrf
              <input type="submit" value="Active" name="stat">
              </form>
             @else
              <form action="/manage_user/{{$user->id}}" method="POST">
                 @csrf
              <input type="submit" value="unActive" name="stat">
              </form>
             @endif
  @empty
      <p>is empty</p>
  @endforelse
</body>
</html>