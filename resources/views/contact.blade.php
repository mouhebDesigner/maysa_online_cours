@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="noticed">
                <div class="main-part">                           
                    <div class="method-account">
                        <h2 class="login">Contactez-nous</h2>
                        <form method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="nom" placeholder="Saisir votre nom" required="">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="sujet" placeholder="Saisir votre sujet" required="">
                                    @error('sujet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="email" name="email" placeholder="Saisir votre email" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" name="numtel" placeholder="Saisir votre numtel" required="">
                                    @error('numtel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="message" id="" cols="30" rows="10" placeholder="saisir votre message"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="readon submit-btn">Envoyer</button>
                            <div class="form-group row mb-0">
                           
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

