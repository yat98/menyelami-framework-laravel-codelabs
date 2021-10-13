@extends('master')

@section('title', 'Kalimat Motivasi')

@section('body')
    <h1>Asli</h1>
    <p>
        <?php echo $kalimat; ?> - <?php echo $penulis; ?>
    </p>
    @include('partials._footer')
@endsection
