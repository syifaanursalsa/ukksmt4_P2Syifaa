<!DOCTYPE html>
<html>
<head>
    <title>Owner Dashboard</title>
</head>
<body>
    <h1>Halo owner, Selamat Datang di Dashboard Parkir!</h1>
    <p>Login kamu sudah sukses 100%.</p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
