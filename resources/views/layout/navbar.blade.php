<nav class="navbar navbar-expand-lg navbar-light nav-custom fixed-top navbar-color">
    <a class="navbar-brand navbar-toggler" href="/"><img width="40" src="../img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="nav-bar">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="" class="logo mobile-none"><img src="../img/logo.png" alt=""></a>
            <ul class="navbar-nav ml-auto gap-1">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/service_product">Service & Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactus">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
<script>
    const navcolor = document.querySelector(".navbar-color");
    window.onscroll = () => {
        if (window.scrollY > 0) {
            navcolor.classList.add("color-active");
        } else {
            navcolor.classList.remove("color-active");
        }
    };
</script>