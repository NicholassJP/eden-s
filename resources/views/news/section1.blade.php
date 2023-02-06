<div class="container">
    <section id="news-section-1">
        <div class="text-center">
            <h1>Our Project</h1>
        </div>
        <ul class="nav nav-pills nav-news mb-4 mt-4 justify-content-center gap-1" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Show All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Gas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Oil</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row" id="paginate">
                    @for ($i = 1; $i <= 12; $i++) <div class="test-group col-lg-4">
                        <a href="/detail_news">
                            <div class="mb-4">
                                <div class="wrapper-img">
                                    <img class="news-img img-fluid" src="/img/news/news2.jpg" alt="">
                                </div>
                            </div>
                        </a>
                </div>
                @endfor
            </div>
            <nav aria-label="...">
                <ul class="pagination justify-content-center align-items-center gap-1 mt-4">
                    <li id="previous-page" class="mt-03">
                        <a href="javascript:void(0)" aria-label="Previous"><i class="fas fa-arrow-left mt-3px"></i></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
</section>
</div>