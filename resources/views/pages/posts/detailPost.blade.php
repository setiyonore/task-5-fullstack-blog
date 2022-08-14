@extends('layouts.blog')
@section('content')
    <div class="container-fluid">
        <main class="tm-main">
            <div class="row tm-row">
                <div class="col-12">
                    <div class="col-12">
                        @if ($data->user_id == \Auth::id())
                            <a href="#" class="btn btn-primary float-right">Edit</a>
                            <button class="btn btn-danger">Hapus</button>
                        @endif
                    </div>
                    <hr class="tm-hr-primary tm-mb-55">
                    <img src="{{asset('storage/post/'.$data->image)}}" alt="" srcset="">
                </div>
            </div>
            <br>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{$data->title}}</h2>
                            <p class="tm-mb-40">{{ \Carbon\Carbon::parse($data->date)->diffForHumans() }} posted by {{$data->author}}</p>
                            <p>
                                {!!$data->content!!}
                            </p>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            <li><a href="#" class="tm-color-primary">{{$data->category}}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </main>
    </div>
@endsection
