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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <p>Пользователь сайта</p>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="text-center" id="author">
                            <table class="table table-th-block">
                                <tbody>
                                    <tr><td class="active">Имя:</td><td>{{$article->name}}</td></tr>
                                    <tr><td class="active">Email:</td><td>{{$article->email}}</td></tr>
                                    <tr><td class="active">Логин:</td><td>{{$article->login}}</td></tr>  
                                    <tr><td class="active">Статус:</td><td>{{$article->role}}</td></tr>  
                                    <tr><td class="active">Дата регистрации</td><td>{{$article->created_at}}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    @endsection    
</body>
</html>