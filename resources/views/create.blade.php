@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ</div>
    <form class="card-body" action="{{ route('store')}}" method="POST">
        @csrf
        <div class="form-floating">
            <textarea class="form-control mb-5" name="content" style="height: 100px" placeholder="新しいメモ"></textarea>
        </div>
        @error('content')
            <div class='alert alert-danger'> Content is empty！</div>
        @enderror
        @foreach($tags as $t)
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id']}}" value="{{ $t['id']}}" >
                <label class="form-check-label" for="{{ $t['id']}}">{{ $t['name'] }}</label>
            </div>
        @endforeach
        <input type="text" class="form-control w-50 mb-5" name="new_tag" placeholder="新しいタグ">
        <button type="submit" class="btn btn-outline-secondary">保存</button>
    </form>
</div>
@endsection
