@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier une séance 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire de modification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/seances/'.$seance->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="temps_debut">Temps début</label>
                                    <input type="time" class="form-control" name="temps_debut" value="{{ $seance->temps_debut }}" id="temps_debut" placeholder="Saisir temps_debut de diplome">
                                    @error('temps_debut')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="temps_fin">Temps fin</label>
                                    <input type="time" class="form-control" name="temps_fin" value="{{ $seance->temps_fin }}" id="temps_fin" placeholder="Saisir temps_fin de diplome">
                                    @error('temps_fin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label for="jours">Jour</label>
                                    <select name="jours" id="jours" class="form-control">
                                        <option value="" selected disbaled>Choisir jour</option>
                                        @for($i=0; $i < count($jours); $i++)
                                            <option value="{{ $jours[$i] }}" @if($seance->jours == $jours[$i]) selected @endif>{{ $jours[$i] }}</option>
                                        @endfor
                                    </select>
                                    @error('jours')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="classe_id">Classe</label>
                                    <select name="classe_id" id="classe_id" class="form-control">
                                        <option value="" selected disbaled>Choisir classe</option>
                                        @foreach(App\Models\Classe::all() as $classe)
                                            <option value="{{ $classe->id }}" @if($seance->classe_id == $classe->id) selected @endif>{{ $classe->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('classe_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="matiere_id">Matière</label>
                                    <select name="matiere_id" id="matiere_id" class="form-control">
                                        <option value="" selected disbaled>Choisir classe</option>
                                        @foreach(App\Models\Matiere::all() as $matiere)
                                            <option value="{{ $matiere->id }}" @if($seance->matiere_id == $matiere->id) selected @endif>{{ $matiere->titre }}</option>
                                        @endforeach
                                    </select>
                                    @error('matiere_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formateur_id">Formateur</label>
                                    <select name="formateur_id" id="formateur_id" class="form-control">
                                        <option value="" selected disbaled>Choisir formateur</option>
                                        @foreach(App\Models\Formateur::all() as $formateur)
                                            <option value="{{ $formateur->id }}" @if($seance->formateur_id == $formateur->id) selected @endif>{{ $formateur->user->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('formateur_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection