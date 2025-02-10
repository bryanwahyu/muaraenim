@extends('layout.admin')

@section('isi')
<script src="{{asset('chart.min.js')}}"></script>
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Post</h4>
        <p class="card-description">
          <a href="{{url('post/create')}}" class="btn btn-primary">Tambah Data</a>  
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No </th>
                <th> Judul </th>
                <th> content </th>
                <th> jumlah komentar </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($data as $item)
              <tr>
                <td> {{$no++}} </td>
                <td> {{$item->title}} </td>
                <td> {{$item->content}} </td>
                <td> {{$item->comment()->count()}} </td>
                <td>
                  <a href="{{url('post/'.$item->id)}}" class="btn btn-info">Detail</a>
                  <a href="{{url('post/'.$item->id.'/edit')}}" class="btn btn-warning">Edit</a>
                  <a href="{{url('post/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
