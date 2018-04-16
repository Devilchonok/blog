@extends('layouts.site')
@section('content')
<div class="container">
    <p class="btn btn-primary mb1 bg-green">Всего заявок: {{$feedbacksCount}} </p>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Имя</th>
        <th>Почта</th>
        <th>Сообщение</th>
        <th>Дата отправки заявки</th>
        <th>Статус заявки</th>
        </thead>
        <tbody >
            @foreach($all as $feedback)
            <tr class="{{$feedback->status}}">
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->email}}</td>
                <td>{{$feedback->message}}</td>
                <td>{{$feedback->created_at}}</td>
                <td>{{$feedback->status}}</td>
                <td><a href="{{ route('adminshowfeedback',['id'=>$feedback->id]) }}" class="btn btn-info">Просмотр заявки</a></td>
                <td><a href="{{route('deletefeedback',$feedback->id)}}" class="btn btn-info">Удалить заявку</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>@endsection  
</body>
</html>