@extends('layouts.site')
@section('content')
<div class="content">
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea">
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
            @if($article)
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">
                        <div class="single_page_content"> 
                            <h2>Имя отправителя: {{ $article->name}}</h2>
                            <h2>Почта отправителя: {{ $article->email}}</h2>
                            <h2>Сообщение</h2>
                            </p>{{ $article->message}}</p>
                            <a href="{{route('deletefeedback',$article->id)}}" class="btn btn-info" style="float:right">Удалить заявку</a>
                        </div>
                        <div class="social_link">
                            <ul class="sociallink_nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Баннер</span></h2>
                        <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
                </aside>
            </div>
            @endif
        </div>
    </section>
    @endsection    
</body>
</html>