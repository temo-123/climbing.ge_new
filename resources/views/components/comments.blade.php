    <div class="wrap">
        @if(isset($comments) && is_object($comments))
        @forelse($comments as $k=>$comment)
        <img src="{{asset('images/site_img/demo/user.png')}}" />
        <div class="comment" data-owner="{{$comment -> name}} {{$comment -> surname}}">
            <p>{{$comment -> text}}</p>
            <ol class="postscript">
                <li class="date">{{$comment -> created_at}}</li>
            </ol>
        </div>
            @empty
                No Coments
            @endforelse
        @else
            Error
        @endif
    </div>



    <style type="text/css">
        div.wrap {
    width: 90%;
    margin: 0 auto 1em auto;
    position: relative;
}

div.wrap:first-child {
    margin-top: 1em;
}

div.comment {
    font-size: 1em;
    position: relative;
    margin-left: 60px;
    border-radius: 0.75em 0.75em 0.75em 0.75em;
    background-color: #eaeaea;
    line-height: 1.4em;
    font-family: Helvetica;
}

div.comment::before {
    content: attr(data-owner);
    border-radius: 0.75em 0.75em 0 0;
    background-color: #ccc;
    display: block;
    text-indent: 10%;
    border-bottom: 3px solid #999;
}

div.comment::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    border: 10px solid transparent;
    border-right: 10px solid #ccc;
    margin: -10px 0 0 -20px;
}

div.comment p {
    width: 80%;
    margin: 0 auto 1em auto;
}

img {
    position: absolute;
    top: 50%;
    width: 50px;
    float: left;
    border-radius: 10px;
    margin-top: -25px;
}

p + ol.postscript {
    width: 80%;
    font-size: 0.8em;
    margin: -0.5em auto 0 auto;
}
ol.postscript::after {
    content: '';
    height: 0.5em;
    display: block;
    clear: both;
}
ol.postscript li {
    float: left;
    margin-right: 0.5em;
}
ol.postscript li.date {
    float: right;
    margin-right: 0;
}

.wrap a:link,
.wrap a:visited {
    color: #333;
    text-decoration: none;
    border-bottom: 1px solid #333;
}

.wrap a:hover,
.wrap a:active,
.wrap a:focus {
    color: #f00;
    border-bottom: 1px solid #f00;
}
    </style>