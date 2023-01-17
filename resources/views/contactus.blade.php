@include('layout.head')
@php
$json = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getcontact'), true);
$tampil_kontak = $json["data"]["category"];
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