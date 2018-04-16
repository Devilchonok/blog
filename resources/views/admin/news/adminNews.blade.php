@extends('layouts.site')
@section('content')
<div class="container">
    <p class="btn btn-primary mb1 bg-green">Всего новостей: {{$newsCount}} </p>
    <a href="{{ route('form')}}" class="btn btn-primary">Добавить новость</a>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Автор</th>
        <th>Категория</th>
        <th>Заголовок</th>
        <th>Краткое описание</th>
        <th>Дата публикации</th>
        <th>Картинка</th>
        </thead>
        <tbody >
            @foreach($all as $user)
            <tr>
                <td>{{$user->author}}</td>
                <td><div style="max-width:66px;overflow-x:hidden">{{$user->category->title}}</div></td>
                <td>{{$user->title}}</td>
                <td><div style="max-height:120px;overflow-x:hidden">{{$user->descr}}</div></td>
                <td>{{$user->created_at}}</td>
                <td>
                    <div style="width:100px;height:120px">
                        @empty(!$user->image)
                        <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/'.$user->image)}}">
                        @else
                        Загрузите изображение
                        @endempty
                    </div>
                </td>
                <td><a href="{{ route('adminShow',['id'=>$user->id]) }}" class="btn btn-info">Просмотр новости</a></td>
                <td><a href="{{ route('edit',['id'=>$user->id]) }}" class="btn btn-info">Редактировать новость</a></td>
                <td><a href="{{route('deletenews',$user->id)}}" onclick="return confirmDelete();" class="btn btn-info">Удалить новость</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
	{{$all->links()}}
	<script>
        function confirmDelete() {
            if (confirm("Вы подтверждаете удаление?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</div>@endsection  
</body>
</html>