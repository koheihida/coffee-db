@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ</div>
    <form class="card-body" action="/store" method="POST">
        @csrf
        <div class="form-floating">
            <textarea class="form-control" placeholder="ここにメモを入力" name="content" style="height: 100px"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-secondary">保存</button>
    </form>
</div>
@endsection
