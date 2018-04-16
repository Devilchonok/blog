@extends('layouts.site')
@section('content')
<div class="content">
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea">
                    <ul id="ticker01" class="news_sticker">
                    </ul>
                    <div class="social_area">
                        <ul class="social_nav">
                            <li class="facebook"><a href="https://www.facebook.com"></a></li>
                            <li class="twitter"><a href="https://twitter.com"></a></li>
                            <li class="youtube"><a href="https://www.youtube.com/"></a></li>
                            <li class="mail"><a href="{{ route('feedback') }}"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="left_content">
                    @foreach($all as $category)
                    <div class="fashion_technology_area">
                        <div class="fashion">
                            <div class="single_post_content">
                                <h2><span><a href="{{ route('category',['category'=>$category->id ]) }}">{{ $category->title }}</a></span></h2>
                                <ul class="business_catgnav wow fadeInDown">
                                    <li>
                                        <figure class="bsbig_fig"> <a href="{{ route('category',['category'=>$category->id ]) }}" class="featured_img"> <img alt="" src="{{('css/images/'.$category->image)}}"> <span class="overlay"></span> </a>
                                            <p>{{$category->text}}</p>
                                            <p><a class="btn btn-info" href="{{ route('category',['category'=>$category->id ]) }}" role="button">Подробнее &raquo;</a></p>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3s col-md-3 col-sm-3">
                <aside class="right_content">
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Баннер</span></h2>
                        <a class="sideAdd" href="#"><img src="css/images/add_img.png" alt=""></a> </div>
                </aside>
            </div>
        </div>
    </section>
</div>@endsection  
</body>
</html>
