@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h2 class="display-6">文章列表</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <td>No.</td>
            <td>作者</td>
            <td>標題</td>
            <td>建立時間</td>
            <td>修改時間</td>
            <td colspan = 2>操作</td>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
            <tr>
                <td>{{$doc->id}}</td>
                <td>{{$doc->author}}</td>
                <td>{{$doc->title}}</td>
                <td>{{$doc->ctime}}</td>
                <td>{{$doc->mtime}}</td>
                <td>
                    <a href="{{ route('documents.edit',$doc->id) }}" class="btn btn-primary">編輯</a>
                </td>
                <td>
                    <form action="{{ route('documents.destroy', $doc->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">刪除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
</div>
@endsection