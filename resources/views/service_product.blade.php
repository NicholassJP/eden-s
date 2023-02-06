@include('layout.head')
@php
$json = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getcontent?tipe=nav'), true);
$tampil_nav_foot = $json["data"];
$json = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getsv'), true);
$tampil_service_product = $json["data"];

@endphp
<body>
    @include('layout.navbar')
    @include('home.section1')
    @include('service_product.section1')
    @include('service_product.section2')

    @include('layout.footer')
</body>

</html>