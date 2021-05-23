@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30">
            <div class="sub-title primary">Mes notes</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Matiére</th>
                            <th scope="col">Formateur</th>
                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $key => $note)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $note->matiere->titre }}</td>
                                <td>{{ $note->matiere->formateur->user->nom }}</td>
                                <td>{{ $note->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

