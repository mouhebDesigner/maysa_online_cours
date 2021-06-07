@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-team" class="rs-team style1 gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-50 md-mb-30">
            <div class="sub-title primary">Formateurs</div>
            <h2 class="title mb-0">Expert formateurs</h2>
        </div>
            
            
        <div class="row">
        @foreach($formateurs as $formateur)
        
            <div class="col-md-4">
                <div class="formateur">
                    <img src="{{ asset('storage/'.$formateur->photo) }}" alt="">
                    <div class="name">
                        <p>
                        
                            {{ $formateur->nom }}
                            {{ $formateur->prenom }}
                        </p>
                        <span>{{ $formateur->email }}</span>
                    </div>
                </div>
            </div>
        @endforeach
       
        </div>
            
            

    </div>
</div>
@endsection

