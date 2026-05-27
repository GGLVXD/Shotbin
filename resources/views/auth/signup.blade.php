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
    <div class="card bg-base-100 w-full h-full max-w-sm shrink-0 shadow-2xl">
      <div class="card-body">
        <h1 class="text-4xl text-center font-bold">Register now!</h1>
        <form method="POST" action="/signup">
          @csrf
          <fieldset class="fieldset">
            <label class="label">Name</label>
            <input type="text"
                    name="name"
                    placeholder="John Doe"
                    value="{{ old('name') }}"
                    class="input input-bordered @error('name') input-error @enderror"
                    required>
            <label class="label">Email</label>
            <input type="email"
        name="email"
        placeholder="mail@example.com"
        value="{{ old('email') }}"
        class="input input-bordered @error('email') input-error @enderror"
        required>
            <label class="label">Password</label>
            <input type="password"
                    name="password"
                    placeholder="••••••••"
                    class="input input-bordered @error('password') input-error @enderror"
                    required>
            <label class="label">Confirm Password</label>
            <label class="floating-label mb-6">
                <input type="password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        class="input input-bordered"
                        required>
                <span>Confirm Password</span>
            </label>
            <div><a class="link link-hover">Forgot password?</a></div>
            <button class="btn btn-neutral mt-4">Register</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>