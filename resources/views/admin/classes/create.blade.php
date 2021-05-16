@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un classe 
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
                        <form action="{{ url('admin/classes') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Nom de la classe</label>
                                    <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" id="nom" placeholder="Saisir nom de la classe">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="diplome_id">Diplômes</label>
                                    <select name="diplome_id" id="diplome_id" class="form-control">
                                        <option value="" selected disbaled>Choisir diplôme</option>
                                        @foreach(App\Models\Diplome::all() as $diplome)
                                            <option value="{{ $diplome->id }}" @if(old('diplome_id') == $diplome->id) selected @endif>{{ $diplome->titre }}</option>
                                        @endforeach
                                    </select>
                                    @error('diplome_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="niveau">Niveau</label>
                                    <select name="niveau" id="niveau" class="form-control">
                                        <option value="" selected disbaled>Choisir niveau</option>
                                        <option value="Première année"@if(old('niveau') == 'Première année') selected @endif>Première année</option>
                                        <option value="Deuxième année"@if(old('niveau') == 'Deuxième année') selected @endif>Deuxième année</option>
                                    </select>
                                    @error('niveau')
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

    