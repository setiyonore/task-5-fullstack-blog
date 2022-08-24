@extends('layouts.blog')
@section('include')
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
@endsection
@section('style')
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <main class="tm-main">
            <h3>Create Post</h3><br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            @foreach ($category as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label for="editor">Content</label>
                    <div class="form-group">
                        {{-- <div id="editor" name="content"> --}}
                            <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="float-right mt-1 mb-2">
                    <button class="btn btn-success" type="submit">
                       <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <div class="float-right mt-1 mb-2 mr-2">
                    <button class="btn btn-danger">Batal</button>
                </div>
            </form>
        </main>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
@endsection
