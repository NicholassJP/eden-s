<section id="ser-section-1">
    <div class="container">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Service</a>
            </li>
            @foreach($tampil_service_product['service'] as $value)
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#{{$value['title']}}" role="tab" aria-controls="pills-profile" aria-selected="false">{{$value['title']}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    @foreach($tampil_service_product['all_product'] as $value)
                    <div class="col-lg-4 mb-2">
                        <div class="ser-card-section1">
                            <img class="mb-2" src="/img/section3/bg1.png" alt="">
                            <h5>{{$value['title']}}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam elit adipiscing integer natoque urna auctor. </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @foreach($tampil_service_product['service'] as $value)
            <div class="tab-pane fade" id="{{$value['title']}}" role="tabpanel" aria-labelledby="{{$value['title']}}-tab">
                <div class="row">
                    @foreach($value['product'] as $value_product)
                    <div class="col-lg-4 mb-2">
                        <div class="ser-card-section1">
                            <img class="mb-2" src="/img/section3/bg1.png" alt="">
                            <h5>{{$value_product['title']}}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam elit adipiscing integer natoque urna auctor. </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>