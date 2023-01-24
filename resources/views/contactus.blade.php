@include('layout.head')
@php
$api = 'https://staging.edenslightconsultant.com/api/v1/';

$json = json_decode(file_get_contents($api.'getcontact'), true);
$tampil_kontak = $json["data"]["category"];
$json = json_decode(file_get_contents($api.'getcontent?tipe=nav'), true);
$tampil_nav_foot = $json["data"];
@endphp

<body>
    @include('layout.navbar')
    @include('home.section1')
    @include('contactus.section1')
    @include('contactus.section2')
    @include('layout.script')
    @include('layout.footer')
</body>

</html>