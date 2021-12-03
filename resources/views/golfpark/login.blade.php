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
  <div class="main">
    <h1>Golfpark Infomation<br>for Driver</h1>
    <h2>ログインフォーム</h2>
    <form method="post" action="{{ route('login') }}">
    @csrf
    @if (session('login_error'))
      <div>{{ session('login_error') }}</div>
    @endif
      <p><input type="email" name="email" placeholder="メールアドレス"></p>
      @if ($errors->has('email'))
        <div class="text-danger">
          {{ $errors->first('email') }}
        </div>
      @endif
      <p><input type="password" name="password" placeholder="パスワード"></p>
      @if ($errors->has('password'))
        <div class="text-danger">
          {{ $errors->first('password') }}
        </div>
      @endif
      <button type="submit">ログイン</button>
    </form>
    <a href="/new_account">新規登録</a>
  </div>
  
</body>
</html>