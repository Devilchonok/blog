@extends('layouts.site')
@section('content')
<div class="container">
    <a href="{{route('news') }}" class="btn btn-success"><p>Всего новостей: {{$newsCount}} </p> </a>
    <a href="{{route('feedbacks') }}" class="btn btn-success"><p>Всего заявок: {{$feedbacksCount}} </p></a>
	 <a href="{{route('users') }}" class="btn btn-success"><p>Пользователей:  {{$usersCount}}</p></a>
    <div class="admin">
        <figure class="bsbig_fig"> <a  class="featured_img"> <img  src="css/images/admin.jpg"> </a>
    </div>
</div>@endsection  
</body>
</html>
