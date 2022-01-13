@extends('open')

@section('content')
<div class="card">
    <div class="card-header">コメント</div>
        <div class="card h-100">
            @foreach ($comments as $comment)
                {{ $comment }}
            @endforeach
        </div>
</div>
@endsection
