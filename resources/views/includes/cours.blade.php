<div id="cours" class="rs-popular-courses bg6 style1 pt-94 pb-70 md-pt-64 md-pb-40">
                <div class="container">
                    <div class="row y-middle mb-50 md-mb-30">
                        <div class="col-md-6 sm-mb-30">
                            <div class="sec-title">
                                <div class="sub-title primary">Les cours</div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-part text-right sm-text-left">
                                <a href="{{ url('cours') }}" class="readon">Voir tout</a>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        
                        
                        
                        
                        @foreach(App\Models\Cour::all() as $cour)
                        @if($cour->videos()->count())

                        <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 500ms; animation-name: fadeInUp;">
                            <div class="courses-item">
                                <div class="img-part">
                                    <img src="{{ asset('storage/'.$cour->image) }}" alt="">
                                </div>
                                <div class="content-part">
                                    <ul class="meta-part">
                                        <li><span class="price">{{ $cour->prix }} DT</span></li>
                                        <li><a class="categorie" href="#">{{ $cour->title }}</a></li>
                                    </ul>
                                    <div class="bottom-part">
                                        <div class="info-meta">
                                            <ul>
                                                <li class="user"><i class="fa fa-user"></i> 245</li>
                                                <li class="ratings">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    (05)
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-part">
                                            <a href="{{ url('cours/'.$cour->id) }}"><i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>