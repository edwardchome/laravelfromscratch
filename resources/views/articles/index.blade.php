@extends('layout2')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @foreach($articles as $article )
                <div id="content">
                    <div class="title">

                        <a href="{{route('articles.show',$article->id)}}">

                            <h2>{{$article->title}}</h2>
                        </a>

                            <span class="byline">{{$article->excerpt}}</span> </div>

                            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
    {{--                        <p> {{$article->body}}</p>--}}

                </div>
            @endforeach

        </div>
    </div>


@endsection
