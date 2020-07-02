@extends('layout.main')
    @section('content')
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{ $post->title }}</h2>

                    @can('update', $post)
                    &nbsp;
                    <a style="margin: auto"  href="/posts/{{ $post->id }}/edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @endcan

                    @can('delete', $post)
                    &nbsp;
                    <a style="margin: auto"  href="/posts/{{ $post->id }}/delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    @endcan

                </div>

                <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}
                    &nbsp;
                    <a href="#">{{ $post->user->name }}</a>
                </p>
                {!! $post->content !!}


                <div>
                @if($post->zan(Auth::id())->exists())
                    {{--取消赞--}}
                    <a href="/posts/unzan/{{ $post->id }}" type="button" class="glyphicon glyphicon-heart"></a>
                @else
                    <a href="/posts/zan/{{ $post->id }}" type="button" class="glyphicon glyphicon-heart-empty"></a>
                @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">评论</div>


                <ul class="list-group">
                    @foreach($post->comment as $comments)
                    <li class="list-group-item">
                        <h5>{{ $comments->created_at }} by {{ $comments->user->name }}</h5>
                        <div>{{ $comments->content }}</div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">发表评论</div>
                <ul class="list-group">
                    <form action="/comment/{{$post->id}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                        <li class="list-group-item">
                            <textarea name="content" class="form-control" rows="10"></textarea>
                            @include('layout.error')
                            <button class="btn btn-default" type="submit">提交</button>
                        </li>
                    </form>
                </ul>
            </div>

        </div>
    @endsection


