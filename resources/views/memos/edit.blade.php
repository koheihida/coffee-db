@extends('layouts.app')
@section('javascript')
<script src="/js/confirm.js"></script>
@endsection
@section('content')
<div class="card">
    <div class="edit_color">
        <div class="card-header d-flex justify-content-between ellipsis">
            <div>
                編集<i class="fas fa-pencil-alt"></i>
            </div>
            <form id="delete-form" action="{{ route('destroy') }}" method="POST">
                @csrf
                <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}">
                <i class="fas fa-trash-alt" onclick="deleteHandle(event)"></i>
            </form>
        </div>
        <form class="card-body my-card-body" action="{{ route('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}">
            <div class="form-floating">
                <textarea class="form-control" placeholder="ここにメモを入力" name="content" style="height: 100px" >{{ $edit_memo[0]['content'] }}</textarea>
            </div>
            @error('content')
                <div class='alert alert-danger'> Content is empty！</div>
            @enderror
            @foreach($tags as $t)
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id']}}" value="{{ $t['id'] }}"  {{ in_array($t[ 'id' ], $include_tags) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name'] }}</label>
                </div>
            @endforeach
            <input type="text" class="form-control w-50 mb-5 elipsis" name="new_tag" placeholder="新しいタグ" value="{{ old('new_tag') }}">
            <!-- <img scr="{{ '/storage'.$edit_memo[0]['image'] }}" class="w-100 mb-3" /> -->


            @error('tags')
                <div class='alert alert-danger'> Tag is empty！</div>
            @enderror
            <h5>"Please make sure to tag"<h5>
            <button type="submit" class="btn btn-outline-secondary">更新</button>
        </form>
    <div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
