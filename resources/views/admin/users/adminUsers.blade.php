@extends('layouts.site')
@section('content')
<div class="content">
    <p class="btn btn-primary mb1 bg-green">Всего пользователей: {{$usersCount}} </p>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Имя</th>
        <th>Почта</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Дата регистрации</th>
        </thead>
        <tbody >
            @foreach($all as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->login}}</td>
                <td><div style="max-width:250px;overflow-x:hidden">{{$users->password}}</div></td>
                <td>{{$users->created_at}}</td>
                <td><a href="{{ route('adminshowuser',['id'=>$users->id]) }}" class="btn btn-info">Работа с пользователем</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>@endsection  
</body>
</html>