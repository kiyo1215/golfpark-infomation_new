<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/app.reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <title>Document</title>
</head>
<body>
<main>
<x-guest-layout>
        <h1>Golfpark Infomation<br>for Driver</h1>
    <h2>ログインフォーム</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"/>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                required autocomplete="current-password"/>
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
</x-guest-layout>
</main>
</body>
</html>
