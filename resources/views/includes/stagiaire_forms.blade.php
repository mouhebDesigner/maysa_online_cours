<div class="styled-form">
    <form  method="post" action="{{ url('stagiaire') }}">         
        @csrf
        <div class="row clearfix">                                    
            <!-- Form Group -->
            <div class="form-group col-lg-12 mb-25">
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre nom">
                @error('nom')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group col-lg-12 mb-25">
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre prenom">
                @error('prenom')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group col-lg-12 mb-25">
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre email">
                @error('email')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre mot de passe">
                @error('password')
                    <span class="invalid-feedback" role="alert" style="display:inline">
                        <strong class="font-size_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <input type="password" id="password_confirmation" name="password_confirmation"  class="@error('prenom') error_input @enderror" placeholder="Confirmer le mot de passe">

            </div>
            <div class="form-group col-lg-12 mb-25">
                <input type="number" id="numtel" name="numtel" value="{{ old('numtel') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre numtel">
                @error('numtel')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <input type="text"  onclick="this.type = 'date'" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre date naissance">
                @error('date_naissance')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <select name="niveau" id="niveau">
                    <option value="" disabled selected >Choisir votre niveau</option>
                    <option value="Premi??re ann??e">Premi??re ann??e</option>
                    <option value="Deuxi??me ann??e">Deuxi??me ann??e</option>
                </select>
                @error('niveau')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <select name="diplome_id" id="">
                    <option value="" selected disbaled>Choisir votre diplome</option>
                    @foreach(App\Models\Diplome::all()  as $diplome)
                        <option value="{{ $diplome->id }}">{{ $diplome->titre }}</option>
                    @endforeach
                </select>
                @error('diplome_id')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <select name="classe_id" id="">
                    <option value="" selected disbaled>Choisir votre classe</option>
                    @foreach(App\Models\Classe::all()  as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                </select>
                @error('classe_id')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 mb-25">
                <label for="photo" class="photo_label">T??l??charger photo</label>
                <input type="file" id="photo" name="photo" value="{{ old('photo') }}" class="input_file @error('photo') error_input @enderror">
                @error('photo')
                    <span class="invalid-feedback" role="alert" style="display: inline">
                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                <button type="submit" class="readon register-btn">
                    <span class="txt">Inscrire</span>
                </button>
            </div>
            
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <div class="users">Avez-vous un compte? <a href="login.html">Connecter</a></div>
            </div>
            
        </div>
        
    </form>
</div>