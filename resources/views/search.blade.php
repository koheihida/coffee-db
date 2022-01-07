@extends('layouts.app')

@section('content')
<div class="card h-100">
    <div class="card-header">メモ検索</div>
    <div class="card-body my-card-body">
            <div class="mb-3">
                <form action="{{ route('search') }}" method="GET" >
                    @method('POST')
                    <textarea class="w-100 search-taxt" name="keyword" style="height: 50px" placeholder="検索したい言葉を入力" ></textarea>
                    <button type="submit" class="btn btn-outline-secondary">検索</button>
                </form>
            </div>
            <div class="">
                @foreach($searches as $search)
                    <div>
                        <a href="/edit/{{ $search['id'] }}" class="card-text d-block elipsis mb-2">{{ $search['content'] }}</a>
                    </div>
                @endforeach
            </div>
            {{ $searches->links() }}
    </div>
</div>
@endsection

