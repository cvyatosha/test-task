@extends('pattern')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('storage/images/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('view', $post->id) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle mb-1">{{ $post->category }}, {{ $post->teg }}</h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
