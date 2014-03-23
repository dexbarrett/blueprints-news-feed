@extends('layouts.master')

@section('title','Your awesome news aggregation site')

@section('content')
    <h1>Your awesome news aggregation site</h1>
    @if(count($categories))
        @foreach($categories as $category => $cat_feeds)
            <h2>{{ Str::title($category) }}</h2>
            @foreach($cat_feeds as $cat_feed)
                <h3>{{ $cat_feed->title }}</h3>
                <ul>
                @foreach($cat_feed->getParsedFeed() as $eachfeed)
                    @include('partials.feed')
                @endforeach    
               </ul>
            @endforeach
        @endforeach   
    @endif
@stop