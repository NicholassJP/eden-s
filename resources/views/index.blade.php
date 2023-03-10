@include('layout.head')
@php
$api = 'https://staging.edenslightconsultant.com/api/v1/';

$json = json_decode(file_get_contents($api.'gethome'), true);
$tampil_home = $json["data"];

$json = json_decode(file_get_contents($api.'getcontent?tipe=nav'), true);
$tampil_nav_foot = $json["data"];

@endphp

<body>
    @include('layout.navbar')
    @include('home.section1')
    @include('home.section2')
    @include('home.section3')
    @include('home.section4')
    @include('home.section5')
    @include('home.section6')
    @include('layout.script')
    @include('layout.footer')
</body>

</html>