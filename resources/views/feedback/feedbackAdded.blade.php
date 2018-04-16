@extends('layouts.site')
@section('content')
<div class="content">
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Вы оставили заявку</h2>
                        <h2>Сейчас вы будете переадресованы на главную страницу</h2>
                    </div>
                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.youtube.com/"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
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
    @endsection
</body>
</html>
<script>

    setTimeout('location="{{route('main')}}";', 5000);

</script>

