@extends('admin.layouts.login_master')

@section('content')
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" class="fadeIn second" id="login" name="email" placeholder="Saisir votre email">
        @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Saisir votre mot de passe">
        @error('password')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="submit" class="fadeIn fourth" value="Connecter">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>

@endsection