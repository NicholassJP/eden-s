<section id="section-3">
    <div id="bg-section-3" class="d-flex align-items-center">
        <div class="container">
            <div class="text-center">
                <h1>Our Expertise</h1>
                <div class="row">
                    @foreach($tampil_home['expertise'] as $value)
                    <div class="col-lg-6 mt-4">
                        <a class="no-decoration" href="/service_product">
                            <div class="card-section justify-content-center">
                                <div class="wrapper-img1">
                                    <img class="expertise-img img-fluid" src="/img/section3/bg1.png" alt="">
                                </div>
                                <h1 class="m-0 absolute-center">{{$value['title']}}</h1>
                            </div>
                        </a>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>