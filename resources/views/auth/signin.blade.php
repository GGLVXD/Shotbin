<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="hero bg-base-200 min-h-screen">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
      <div class="card-body">
        <h1 class="text-5xl font-bold">Login</h1>
        <form method="POST" method="/signin">
          @csrf
          <fieldset class="fieldset">
            <label class="label">Email</label>
                              <input type="email"
                                    name="email"
                                    placeholder="[mail@example.com](<mailto:mail@example.com>)"
                                    value="{{ old('email') }}"
                                    class="input input-bordered @error('email') input-error @enderror"
                                    required
                                    autofocus>
            <label class="label">Password</label>
                              <input type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    class="input input-bordered @error('password') input-error @enderror"
                                    required>
            <div><a class="link link-hover">Forgot password?</a></div>
            <button class="btn btn-neutral mt-4">Login</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>