<section id="section-5">
    <div class="container-xl">
        <div class="text-center mb-5">
            <h1>Our People</h1>
        </div>
        <div class="row">
            @foreach($tampil_home['person'] as $value)
            <div class='col-6 text-center mb-4'>
                <div class='card-section5'>
                    <div class='text-card responsive-text'>
                        <h4>{{$value['name']}}</h4>
                        <h5 class='title-color'>Creative Leader</h5>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores consequatur ad consectetur dignissimos exercitationem? </p> <a class='mr-2 color-secondary fz-20px' href=''><i class='fa-brands fa-facebook'></i></a> <a class='mr-2 color-secondary fz-20px' href=''><i class='fa-brands fa-twitter'></i></a> <a class='color-secondary fz-20px' href=''><i class='fa-brands fa-instagram'></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>