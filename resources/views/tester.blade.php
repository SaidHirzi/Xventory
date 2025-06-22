<!DOCTYPE html>
<html>

<head>
    <title>Data Users</title>
</head>

<body>
    <h1>Daftar Pengguna</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
            <li>{{ $user->password }} - {{ $user->email }}</li>
        @endforeach
    </ul>
</body>

</html>
