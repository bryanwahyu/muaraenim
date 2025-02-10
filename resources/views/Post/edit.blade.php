@extends('layout.admin')

@section('isi')
<script src="{{asset('chart.min.js')}}"></script>   
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Data Post</h4>
        <p class="card-description">
          <a href="{{url('post')}}" class="btn btn-primary">Kembali</a>  
        </p>
        <div class="table-responsive">
          <form action="{{url('post/'.$item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Judul</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Judul" value="{{$item->title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <textarea class="form-control" name="content" id="exampleInputEmail1" placeholder="Content">{{$item->content}}</textarea>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
