@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un titre de matière 
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
                        <form action="{{ url('admin/matieres') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group" id="enseignant_tp">
                                    <label for="formateur_id">Formateur</label>
                                    <select name="formateur_id" id="formateur_id" class="form-control">
                                        <option value="" selected disbaled>Choisir formateur</option>
                                        @foreach(App\Models\Formateur::all() as $formateur)
                                            <option value="{{ $formateur->id }}" @if(old('formateur_id') == $formateur->id) selected @endif>{{ $formateur->user->nom }} {{ $formateur->user->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="diplome_id">Diplômes</label>
                                    <select name="diplome_id" id="diplome_id" class="form-control">
                                        <option value="" selected disbaled>Choisir diplôme</option>
                                        @foreach(App\Models\Diplome::all() as $diplome)
                                            <option value="{{ $diplome->id }}" @if(old('diplome_id') == $diplome->id) selected @endif>{{ $diplome->titre }}</option>
                                        @endforeach
                                    </select>
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
                                <div class="form-group">
                                    <label for="titre">Titre de matière</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de module">
                                    @error('titre')
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
<script>
    $("#tp").on('click', function(){
        $("#enseignant_tp").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#enseignant_id_tp').append('<option value="'+value.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#td").on('click', function(){
        $("#enseignant_td").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#enseignant_id_td').append('<option value="'+value.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#cours").on('click', function(){
        $("#enseignant_cours").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#enseignant_id_cours').append('<option value="'+value.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#diplome_id").on('change', function(){
        var diplome_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/module_list/'+diplome_id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log("test");
                $("#module_id").empty();
                $("#module_id").append('<option value="" disabled selected> Choisir module</option>')
                $.each(data, function(index, value){
                    $("#module_id").append('<option value="'+value.id+'">'+value.titre+'</option>')
                });
            }    
        });
    });
</script>

@endsection