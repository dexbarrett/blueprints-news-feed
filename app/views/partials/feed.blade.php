<li>
    <strong>{{ $eachfeed->title }}</strong><br/>
    <blockquote>{{ Str::limit(strip_tags($eachfeed->description), 250) }}</blockquote>
    <strong>Date: {{ $eachfeed->pubDate }}</strong><br/>
    <strong>Source: {{ HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35)) }}</strong>
</li>