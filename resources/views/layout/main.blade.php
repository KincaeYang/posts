@include('layout.head')

@include('layout.nav')

<div class="container">

    <div class="blog-header">
    </div>

    <div class="row">
        @yield('content')
        @include('layout.sidebar')

    </div>
</div>
</div>

@include('layout.footer')

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/UEditor-utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/UEditor-utf8-php/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/UEditor-utf8-php/lang/zh-cn/zh-cn.js"></script>
<script src="/js/ylaravel.js"></script>

</body>
</html>