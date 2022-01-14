@extends('open')
@section('javascript')
<script src="/js/confirm.js"></script>
@endsection

@section('content')
<div class="card">
    <div class="card-header">コメント</div>
        <div class="card h-100">
            <div class="card-body my-card-body ellipsis">
            <div class="comment_show">
            @foreach ($comments as $comment)
                <div>
                    {{ $comment['content'] }}
                    @if(Auth::id() === $comment['user_id'])
                    <form id="delete-form" action="{{ route('comment-destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="memo_id" value="{{ $comment['id'] }}">
                        <i class="fas fa-trash-alt" onclick="deleteHandle(event)"></i>
                    </form>
                    @endif
                </div>
                {{ $comment['created_at'] }}
                <div class="line"></div>
            @endforeach
            </div>
            <div class="sp"></div>
            {{ $items->links() }}
        </div>
        </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
