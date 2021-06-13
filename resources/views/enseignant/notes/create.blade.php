@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un note
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('notes.store', ['matiere_id' => $matiere_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="stagiaire_id">Stagiaire</label>
                                            <select name="stagiaire_id" id="stagiaire_id" class="form-control">
                                                <option value="" selected disbaled>Choisir stagiaire</option>
                                                @foreach($stagiaires as $stagiaire)
                                                    @if(!App\Models\Note::where('stagiaire_id', $stagiaire->id)->where('matiere_id', $matiere_id)->first())
                                                    <option value="{{ $stagiaire->id }}" @if(old('stagiaire_id') == $stagiaire->id) selected @endif>{{ $stagiaire->user->nom }} {{ $stagiaire->user->prenom }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('eleve_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input type="number" class="form-control" name="note" value="{{ old('note') }}" id="note" placeholder="Saisir note">
                                            @error("note")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection
@section('script')
    
@endsection
