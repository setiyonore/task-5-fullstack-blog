@extends('layouts.blog')
@section('content')
<div class="container-fluid">
    <main class="tm-main">
        <h3>Create Category</h3><br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}">
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
