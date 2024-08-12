@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron mt-4">
        <h1 class="display-4">Selamat Datang di PT Di Siju Saitama Perkasa</h1>
        <p class="lead">Profil Perusahaan</p>
        <hr class="my-4">
        <p>PT Di Siju Saitama Perkasa adalah perusahaan yang bergerak di bidang manajemen properti dan penyediaan ruang acara. Kami berkomitmen untuk memberikan layanan terbaik kepada klien kami dengan menyediakan gedung-gedung berkualitas tinggi yang dilengkapi dengan fasilitas modern dan nyaman.</p>
        <p>Visi kami adalah menjadi penyedia ruang acara terkemuka di Indonesia yang dikenal karena profesionalisme dan kualitas layanan yang unggul.</p>
        <p>Misi kami adalah memberikan solusi ruang acara yang inovatif dan efisien untuk memenuhi kebutuhan berbagai jenis acara, mulai dari pertemuan bisnis, konferensi, hingga acara sosial.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('gedung.index') }}" role="button">Lihat Daftar Gedung</a>
        <a class="btn btn-primary btn-lg" href="user/calendar" role="button">Lihat Calender Event</a>
    </div>


</div>
@endsection
