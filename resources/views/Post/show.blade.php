@extends('layout.admin')

@section('isi')
<script src="{{asset('chart.min.js')}}"></script>
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Data Post</h4>
        <p class="card-description">
          <a href="{{url('post')}}" class="btn btn-primary">Kembali</a>
        </p>
        <div class="mb-4">
            <h5>{{ $post->title }}</h5>
            <p class="text-muted">Published on: {{ $post->created_at->format('d M Y') }}</p>
            <p>{{ $post->content }}</p>
        </div>
        {{-- Comments Section --}}
        <div class="mt-4">
            <h5>Komentar</h5>
            {{-- Display Comments --}}
            @if($post->comment()->count() > 0)
                @foreach($post->comment() as $comment)
                    <div class="border p-3 mb-2">
                        <span class="text-muted">({{ $comment->created_at->diffForHumans() }})</span>
                        <p>{{ $comment->body }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada komentar.</p>
            @endif

            {{-- Add New Comment --}}
            <form action="{{ route('comments.store') }}" method="POST" class="mt-3">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="comment">Tambahkan Komentar</label>
                    <textarea name="body" id="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Kirim Komentar</button>
            </form>
        </div>

    </div>
</div>
</div>
@endsection