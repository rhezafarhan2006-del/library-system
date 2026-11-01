<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
</head>
<body>

   <h1>Login Sistem Perpustakaan</h1>

    <!-- Pop-up / Alert Flash Message Sukses Logout -->
   @if (session('success'))
       <div style="padding: 10px 15px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px;">
           {{ session('success') }}
       </div>
   @endif

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
   <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
            >
        </div>
        <div>
            <label for="password">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                required
            >
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>

