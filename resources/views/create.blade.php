@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ</div>

    <form class="card-body my-card-body" action="{{ route('store')}}" method="POST">
    <!-- enctype="multipart/form-data" -->
        @csrf

        <textarea class="form-control mb-5" name="content" style="height: 100px" placeholder="新しいメモ" >{{ old('content') }}</textarea>
        
        @error('content')
            <div class='alert alert-danger'> Content is empty！</div>
        @enderror
        @foreach($tags as $t)
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id']}}" value="{{ $t['id']}}" >
                <label class="form-check-label" for="{{ $t['id']}}">{{ $t['name'] }}</label>
            </div>
        @endforeach
        <input type="text" class="form-control w-50 mb-5 elipsis" name="new_tag" placeholder="新しいタグ" value="{{ old('new_tag') }}">
        <!-- <div class="form-group">
            <label for="image"></label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div> -->
        @error('tags')
            <div class='alert alert-danger'> Tag is empty！</div>
        @enderror
        <h5>"Please make sure to tag"<h5>
        <!-- <a type="submit" class="navbar-brand">保存</a> -->
        <button type="submit" class="btn btn-outline-secondary">保存</button>
    </form>
</div>
@endsection
