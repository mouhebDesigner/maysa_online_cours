@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un stagiaire
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
                        <form action="{{ url('admin/stagiaires') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                    
                                            <div class="form-group">
                                                <label for="nom">Nom de stagiaire</label>
                                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" id="nom" placeholder="Saisir nom de stagiaire">
                                                @error('nom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="prenom">Prenom de stagiaire</label>
                                                <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" id="prenom" placeholder="Saisir prenom de stagiaire">
                                                @error('prenom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="numtel">Numéro de téléphone de stagiaire</label>
                                                <input type="text" class="form-control" name="numtel" value="{{ old('numtel') }}" id="numtel" placeholder="Saisir numéro de téléphone de stagiaire">
                                                @error('numtel')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email de stagiaire</label>
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Saisir email de stagiaire">
                                                @error('email')
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
                                                <label for="classe_id">Classes</label>
                                                <select name="classe_id" id="classe_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir classe</option>
                                                </select>
                                                @error('classe_id')
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
                                            <div class="form-group">
                                                <label for="password">Mot de passe de stagiaire</label>
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe de stagiaire">
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirmer la mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <label for="date_naissance">Date de naissance de stagiaire</label>
                                                <input type="date" class="form-control" name="date_naissance" value="{{ old('date_naissance') }}" id="date_naissance" placeholder="Saisir date naissance de stagiaire">
                                                @error('date_naissance')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image">photo de stagiaire</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="photo" class="custom-file-input" id="image">
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
        $("#diplome_id").on('change', function(){
            var diplome_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'get',
                url:'/classe_list/'+diplome_id,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log("test");
                    $("#classe_id").empty();
                    $("#classe_id").append('<option value="" disabled selected> Choisir materiel</option>')
                    $.each(data, function(index, value){
                        $("#classe_id").append('<option value="'+value.id+'">'+value.nom+'</option>')
                    });
                }    
            });
        });
    </script>
@endsection