@extends('layout.main')
    @section('content')
        <div class="col-sm-8 blog-main">
            <form action="/posts" method="POST">

                {{ csrf_field() }}
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="这里是标题">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <script id="content" name="content" type="text/plain" style="height:400px;max-height:650px;"></script>
                </div>
                @include('layout.error')
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div>
    @endsection