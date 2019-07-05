@extends('base')

@section('main')
<div class="row">
    <h1 class="col-sm-6 offset-sm-2">還有什麼事情沒有記錄到的嗎......</h1>
    <div></div>
    <div class="col-sm-8 offset-sm-2">
    <div class="document_creation">
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
        @endif

        <form class="document_info" method="post" action="{{ route('documents.update', $document->id) }}">
        @method('PATCH') 
        @csrf
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" name="title" placeholder="吸引人的標題" value={{ $document->title }}>
        </div>
        <div class="form-group">
            <label for="content">內容</label>
            <textarea class="form-control" name="content" placeholder="寫下你的故事...">{{ $document->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">選擇對文章採取的動作</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
            @foreach ($options as $key => $val)
            @if ($document->status !== $key)
            <option value="{{ $key }}">{{ $val }}</option>
            @else
            <option value="{{ $key }}" selected="selected">{{ $val }}</option>
            @endif
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
    </div>
</div>
@endsection