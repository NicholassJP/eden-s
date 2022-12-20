<section id="section-1">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div id="bg-section-1" class="d-flex align-items-center">
                    <div class="container">
                        <div class="box-section1">
                            <h1 class="mb-2">Lorem Ipsum</h1>
                            <p class="mb-3 wt-section1">Lorem ipsum dolor sit amet consectetur. Sed egestas donec tincidunt at imperdiet ultricies. Convallis sed ac gravida vel. A tellus faucibus non mauris pellentesque donec nisl est commodo. Lectus est ut et facilisis magna nibh sed amet.
                            </p>
                            <button class="btn btn-edens mt-1" type="button">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            @for ($i = 1; $i <= 3; $i++) <div class="carousel-item">
                <div id="bg-section-1" class="d-flex align-items-center">
                    <div class="container">
                        <div class="box-section1">
                            <h1 class="mb-2">Lorem Ipsum</h1>
                            <p class="mb-3 wt-section1">Lorem ipsum dolor sit amet consectetur. Sed egestas donec tincidunt at imperdiet ultricies. Convallis sed ac gravida vel. A tellus faucibus non mauris pellentesque donec nisl est commodo. Lectus est ut et facilisis magna nibh sed amet.
                            </p>
                            <button class="btn btn-edens mt-1" type="button">Read More</button>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>