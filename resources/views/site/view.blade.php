@extends('pattern')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset($photo) }}')">
    </header>
    <!-- Main Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h2 class="section-heading">{{ $post->title }}</h2>
                    <span class="caption text-muted text-start"><b>Category:</b> {{ $post->category }}<br><b>Teg:</b> {{ $post->teg }}</span>
                    <p>{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </article>
@endsection
