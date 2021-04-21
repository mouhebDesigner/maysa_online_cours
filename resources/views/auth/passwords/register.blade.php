@extends('layouts.master')

@section('title', 'Page d\'acceuil')

@section('content')
    @include('includes.header')
    <section class="register-section pt-100 pb-100 loaded">
        <div class="container">
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show  @if(!isset($second)) active @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                         
                        <div class="register-box">
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Créer un nouveau compte formateur</h2>
                            </div>
                            <!-- Login Form -->
                           @include('includes.stagiaire_forms')
                        </div>
                    </div>
                    <div class="tab-pane @if(isset($second)) active show @else fade @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="register-box">
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Créer un nouveau compte stagiaire </h2>
                            </div>
                            @include('includes.formateur_forms')
                            <!-- Login Form -->
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
    @include('includes.footer')
@endsection
