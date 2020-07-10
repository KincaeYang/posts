@extends('layout.main')
@section('content')
        <div class="col-sm-8">
            <blockquote>
                <p>旅游</p>
                <footer>文章：4</footer>
                <button class="btn btn-default topic-submit"  data-toggle="modal" data-target="#topic_submit_modal" topic-id="1" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">投稿</button>
            </blockquote>
        </div>
        <div class="modal fade" id="topic_submit_modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">我的文章</h4>
                    </div>

                    {{--文章展示--}}
                    <div class="modal-body">
                        <form action="/topic/1/submit">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="post_ids[]" value="62">
                                    你好你好
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">投稿</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/5">Kassandra Ankunding2</a> 1个月前</p>
                            <p class=""><a href="/posts/55" >32323</a></p>

                            <p>232323232323232323232323232323232323232323232323232323
                                232323232323232323232323
                                232323232323232323...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


