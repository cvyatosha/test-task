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
                <div class="post-preview mb-5">
                    <div class="new-post-form">
                        <h3 class="text-center">Create new post</h3>

                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <label class="post-title d-block mb-3"><input class="w-100" type="text" name="title" max="1000" placeholder="Title" required></label>
                            <label class="post-subtitle d-block mb-3"><input class="w-100" type="text" name="category" max="500" placeholder="Category" required></label>
                            <label class="post-meta d-block mb-3"><input class="w-100" type="text" name="teg" max="100" placeholder="Teg" required></label>
                            <label class="post-meta d-block mb-3"><textarea class="w-100" style="resize: none;" name="description" placeholder="Description" cols="30" rows="10" required maxlength="10000"></textarea></label>
                            <label class="post-meta d-block mb-3"><input class="w-100" type="file" name="photo" required></label>
                            <label class="d-block"><input class="w-100 p-1 add-post-btn" type="submit" value="Creat"></label>
                        </form>
                    </div>
                </div>

                
                {{-- <hr class="my-4 mb-5" /> --}}
                <h3 class="text-center pt-5 mb5">Your all posts</h3>

                @foreach ($posts as $post)
                    <div class="post-preview p-2" style="background: rgba(0, 133, 161, .2)">
                        <div class="mb-4 d-flex justify-content-between">
                            <h3 class="text-center d-inline-block">Post id: {{ $post->id }}</h3>
                            <form class="d-inline-block" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
    
                                <label class="d-block"><input class="w-100 p-1 add-post-btn" type="submit" value="Delete post"></label>
                            </form>
                        </div>    
                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <label class="post-title d-block mb-3"><input class="w-100" type="text" name="title" value="{{ $post->title }}" max="1000" required></label>
                            <label class="post-subtitle d-block mb-3"><input class="w-100" type="text" name="category" value="{{ $post->category }}" max="500" required></label>
                            <label class="post-meta d-block mb-3"><input class="w-100" type="text" name="teg" value="{{ $post->teg }}" max="100" required></label>
                            <label class="post-meta d-block mb-3"><textarea class="w-100" style="resize: none;" name="description" cols="30" rows="10" required maxlength="10000">{{ $post->description }}</textarea></label>
                            <label class="post-meta d-block mb-3">
                                old photo:
                                <img class="w-50" src="{{ asset($photos->where('post_id', $post->id)->first()->url) }}">
                                <br><br>or choose the new one
                                <input class="w-100" type="file" name="photo">
                            </label>
                            <label class="d-block"><input class="w-100 p-1 add-post-btn" type="submit" value="Save"></label>
                        </form>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4 mb-5" />
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
