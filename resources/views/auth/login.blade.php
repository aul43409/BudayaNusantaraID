<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg border border-red-200">
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-red-700 bg-red-100 p-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <!-- Flash message setelah registrasi -->
        @if (session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-red-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
                       class="mt-1 block w-full px-4 py-2 border border-red-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-red-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full px-4 py-2 border border-red-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" name="remember" type="checkbox"
                       class="text-red-600 border-gray-300 rounded focus:ring-red-500">
                <label for="remember_me" class="ms-2 text-sm text-gray-700">Remember me</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-red-500 hover:underline">Forgot your password?</a>
                @endif

                <button type="submit"
                        class="ml-3 px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Log in
                </button>
            </div>
        </form>
    </div>

</body>
</html>
