@extends('open')

@section('content')
<div class="card">
    <div class="card-header">コメント</div>
        <div class="card h-100">
            <div class="card-body my-card-body ellipsis">
            @foreach ($comments as $comment)
                {{ $comment['content'] }}
            @endforeach
            </div>
        </div>
</div>
@endsection
