@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un titre de diplôme 
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
                        <form action="{{ url('admin/diplomes/'.$diplome->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                            <div class="form-group">
                                <label for="titre">Titre de diplôme</label>
                                <input type="text" class="form-control" name="titre" value="{{ $diplome->titre }}" id="titre" placeholder="Saisir titre de diplome">
                                @error('titre')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="image">Image de diplôme</label>
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