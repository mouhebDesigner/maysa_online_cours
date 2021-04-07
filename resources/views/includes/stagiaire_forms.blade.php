<div class="styled-form">
                                <form  method="post" action="{{ url('stagiaire') }}">         
                                    @csrf
                                    <div class="row clearfix">                                    
                                        <!-- Form Group -->
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" value="" placeholder="Entre votre nom">
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" value="" placeholder="Entre votre prenom">
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="text" id="email" name="email" value="{{ old('email') }}" value="" placeholder="Entre votre email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="password" id="password" name="password" value="{{ old('password') }}" value="" placeholder="Entre votre password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="password" id="password_confirmation" name="password_confirmation"  value="" placeholder="Entre votre password_confirmation">

                                        </div>
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="number" id="numtel" name="numtel" value="{{ old('numtel') }}" value="" placeholder="Entre votre numtel">
                                            @error('numtel')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-25">
                                            <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" value="" placeholder="Entre votre date_naissance">
                                            @error('date_naissance')
                                                <span class="invalid-feedback" role="alert" style="display: inline">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Inscrire</span></button>
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="users">Avez-vous un compte? <a href="login.html">Connecter</a></div>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>