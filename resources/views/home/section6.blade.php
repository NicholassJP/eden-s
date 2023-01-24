<section id="section-6">
    <div class="container">
        <div class="text-center mb-5">
            <h1>Our Partner</h1>
        </div>
        <div class="card-head-section6">
            <div class="row justify-content-center">
                @foreach($tampil_home['partner'] as $value)
                <div class="col-md-4 col-6 mb-2 mt-2">
                    <div class="card-section6">
                        <img class="img-fluid" src="/img/talk.png">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>