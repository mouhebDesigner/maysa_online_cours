<div id="rs-categories" class="rs-categories gray-bg style1 pt-94 pb-70 md-pt-64 md-pb-40">
    <div class="container">
        <div class="row y-middle mb-50 md-mb-30">
            <div class="col-md-6 sm-mb-30">
                <div class="sec-title">
                    <div class="sub-title primary">Les diplômes</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="btn-part text-right sm-text-left">
                    <a href="#" class="readon">View All Categories</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(App\Models\Diplome::all() as $diplome)
            <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 500ms; animation-name: fadeInUp;">
                <a class="categories-item" href="#">
                    <div class="icon-part">
                        <img src="assets/images/categories/icons/9.png" alt="">
                    </div>
                    <div class="content-part">
                        <h4 class="title">{{ $diplome->titre }}</h4>
                        <span class="courses">7 Courses</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>