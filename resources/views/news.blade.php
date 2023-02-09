@include('layout.head')
@php
$json = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getcontent?tipe=nav'), true);
$tampil_nav_foot = $json["data"];
$json = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getnews'), true);
$tampil_news = $json["data"];

@endphp

<body>
    @include('layout.navbar1')
    @include('news.section1')
    @include('layout.script')
    @include('layout.footer')
</body>

</html>