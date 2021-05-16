@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un examen
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
                        <form action="{{ url('enseignant/examens/'.$examen->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body" id="inputs">
                                <div class="form-group" id="enseignant_tp">
                                    <label for="matiere_id">Matière</label>
                                    <select name="matiere_id" id="matiere_id" class="form-control">
                                        <option value="" selected disbaled>Choisir formateur</option>
                                        @foreach(App\Models\Matiere::all() as $matiere)
                                            <option value="{{ $matiere->id }}" @if($examen->matiere_id == $matiere->id) selected @endif>{{ $matiere->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ $examen->date }}" id="date" placeholder="Saisir date d'\examen">
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="temps">Temps</label>
                                    <input type="time" class="form-control" name="temps" value="{{ $examen->temps }}" id="temps" placeholder="Saisir temps d\'examen">
                                    @error('temps')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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