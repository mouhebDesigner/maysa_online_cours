<div class="gray-bg">
    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog style2 pt-94 pb-100 md-pt-64 md-pb-70">
        <div class="container">
            <div class="sec-title mb-60 text-center">
                <div class="sub-title primary">News Update </div>
                <h2 class="title mb-0">Latest News &amp; Events</h2>
            </div>
            <div class="row">
                @foreach(App\Models\Event::all() as $event)
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 500ms; animation-name: fadeInUp;">
                    <div class="blog-item">
                        <div class="image-part">
                            <img src="{{ asset('storage/'.$event->image) }}" alt="">
                        </div>
                        <div class="blog-content new-style">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>{{ $event->created_at->diffForHumans() }}</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">{{ $event->titre }}</a></h3>
                            <div class="desc">the acquisition of knowledge, skills, values befs, and habits. Educational methods include teach ing, training, storytelling</div>
                            <ul class="blog-bottom">
                                <li class="cmnt-part"><a href="#">(12) Comments</a></li>
                                <li class="btn-part"><a class="readon-arrow" href="{{ url('events/'.$event->id.'/show') }}">Voir plus</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>  
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- Newsletter section start -->
    
    <!-- Newsletter section end -->
</div>