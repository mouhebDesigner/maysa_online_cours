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
                        <form action="{{ url('enseignant/examens') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group" id="enseignant_tp">
                                    <label for="matiere_id">Matière</label>
                                    <select name="matiere_id" id="matiere_id" class="form-control">
                                        <option value="" selected disbaled>Choisir matière</option>
                                        @foreach(App\Models\Matiere::all() as $matiere)
                                            @if($matiere->examen()->count() == 0)
                                                <option value="{{ $matiere->id }}" @if(old('matiere_id') == $matiere->id) selected @endif>{{ $matiere->titre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('matiere_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" id="date" placeholder="Saisir date d'\examen">
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="temps">Temps</label>
                                    <input type="time" class="form-control" name="temps" value="{{ old('temps') }}" id="temps" placeholder="Saisir temps d\'examen">
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