<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Save a new ATOM Feed to Database</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <h1>Save a new ATOM Feed to Database</h1>
    @if(Session::has('message'))
        <h2>{{ Session::get('message') }}</h2>
    @endif
    {{ Form::open(array('route' => 'feed.store')) }}
    <h3>Feed Category</h3>
    {{ Form::select('category', array('News' => 'News', 'Sports' => 'Sports', 'Technology' => 'Technology')) }}
    <h3>Title</h3>
    {{ Form::text('title', null, array('placeholder' => 'enter the feed title here')) }}
    <h3>Feed URL</h3>
    {{ Form::text('feed', null, array('placeholder' => 'enter the feed URL here')) }}
    <h3>Show on site?</h3>
    {{ Form::select('active', array('1' => 'Yes', '2' => 'No')) }}
    {{ Form::submit('Save', array('style' => 'margin:20px 100% 0 0')) }}
    {{ Form::close() }} 
</body>
</html>