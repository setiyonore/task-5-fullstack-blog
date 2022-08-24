@extends('layouts.blog')
@section('content')
    <div class="container-fluid">
        <main class="tm-main">
            <a href="{{route('category.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Catogory</a><br>
            <hr class="tm-hr-primary">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $val)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$val->name}}</td>
                        <td>
                            <a href="{{url('/category/edit/'.$val->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                            <form action="{{ url('/category/destroy/'.$val->id) }}" method="post">
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="confirm('Delete post ?')" />
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{$data->links()}}
        </main>
    </div>
@endsection
