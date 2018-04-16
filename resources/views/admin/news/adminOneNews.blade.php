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
            @if($article and $comments)
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">
                        <h1>{{ $article->title }}</h1>
                        <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{ $article->author}}</a> <span><i class="fa fa-calendar"></i>{{ $article->created_at}}</span> <a href="{{ route('category',['category'=>$article->category->id ]) }}"><i class="fa fa-tags"></i>{{ $article->category->title}}</a> </div>
                        <div class="single_page_content"> 
						 <div class="image-lightbox">
						<a href="{{asset('images/'.$article->image)}}" data-lightbox="{{asset('images/'.$article->image)}}" title="{{ $article->title }}">
                                    <img class="img-center"  src="{{asset('images/'.$article->image)}}" alt="">
                                </a>
								</div>
								<p>{{ $article->body}}</p>
								<a href="{{ route('edit',['id'=>$article->id]) }}" class="btn btn-info">Редактировать новость</a>
								<a href="{{route('deletenews',$article->id)}}" class="btn btn-info" style="float:right">Удалить новость</a>
								
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
                <section id="contentSection">
                    <div class="panel-heading"><p>Комментарии</p></div>
                    <div class="row">
                        <div class="comments" style="overflow-x:hidden">
                            @foreach ($article->comments as $comment) 
                            <li class="list-group-item">
                                <strong>{{ $comment->created_at }}: &nbsp;</strong>
                                {{ $comment->body }}
                                <a style="float:right" href="{{route('deleteComment',$comment->id)}}" class="btn btn-info btn-xs">Удалить комментарий</a> 
                                @endforeach
                        </div>
						{{$comments->links()}}
                        <div class="card">
                            <div class="card-block">
                                <form action="{{ $article->id }}/comments" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea name="body" rows='10' placeholder="Введите комментарий." class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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