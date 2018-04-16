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
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Свяжитесь с нами</h2>
                        <p>Свяжитесь с нами, и мы решим вашу проблему</p>
                        <form action="{{route('addFeedback')}}" class="contact_form" method="POST">
                            <input name="name"class="form-control" type="text" placeholder="Имя">
                            <input name="email"class="form-control" type="text" placeholder="Почта">
                            <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Сообщение"></textarea>
                            <input type="submit" value="Отправьте вашу заявку">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Баннер</span></h2>
                    <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
            </div>
        </div>
    </section>
</div>
@endsection
</body>
</html>