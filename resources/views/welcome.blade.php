@extends('layouts.blog')
@section('content')
<div class="container-fluid">
    <main class="tm-main">
        <!-- Search form -->
        <div class="row tm-row">
            <div class="col-12">
                <form method="GET" class="form-inline tm-mb-80 tm-search-form">
                    <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                    <button class="tm-search-button" type="submit">
                        <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row tm-row">
            @foreach ($data as $val)
            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="{{asset('storage/post/'.$val->image)}}" alt="Image" class="img-fluid">
                    </div>
                    <span class="position-absolute tm-new-badge">New</span>
                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$val->title}}</h2>
                </a>
                <p class="tm-pt-30">
                    {!!$val->content!!}
                </p>
                <div class="d-flex justify-content-between tm-pt-45">
                    <span class="tm-color-primary">{{$val->category}}</span>
                    <span class="tm-color-primary"> {{ \Carbon\Carbon::parse($val->date)->diffForHumans() }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    {{-- <span>36 comments</span> --}}
                    <span>by {{$val->author}}</span>
                </div>
            </article>
            @endforeach
        </div>
        <div class="row tm-row tm-mt-100 tm-mb-75">
            {{$data->links()}}
        </div>
        <footer class="row tm-row">
            <hr class="col-12">
            <div class="col-md-6 col-12 tm-color-gray">
                Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
            </div>
            <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                Copyright 2020 Xtra Blog Company Co. Ltd.
            </div>
        </footer>
    </main>
</div>
@endsection
