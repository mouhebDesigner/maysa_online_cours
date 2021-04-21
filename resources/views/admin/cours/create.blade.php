@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un cour
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
                        <form action="{{ url('admin/cours') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="formateur_id">Formateur de cour</label>
                                    <select name="formateur_id" id="formateur_id" class="form-control">
                                        <option value="" selected disabled>Séléctionner un formateur</option>
                                        @foreach(App\Models\Formateur::all() as $formateur)
                                            <option value="{{ $formateur->id }}" @if(old('formateur_id') == $formateur->id) selected @endif>{{ $formateur->user->nom }} {{ $formateur->user->prenom }}</option>
                                        @endforeach
                                    </select>
                                    @error('formateur_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Titre de cour</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Saisir titre de cour">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix de cour</label>
                                    <input type="numeric" class="form-control" name="prix" value="{{ old('prix') }}" id="prix" placeholder="Saisir prix de cour">
                                    @error('prix')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="titre">Description de cour</label>
                                    <textarea cols="10" rows="10"  class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="Saisir description de cour"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image de cour</label>
                                    <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choisir image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Télécharger</span>
                                    </div>
                                    </div>
                                    @error('image')
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