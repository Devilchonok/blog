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
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Результаты поиска</p>
                </div>
                <div class="panel-body">
                    @if (count($result) > 0 or !empty($result) )
                    <table class="table table-responsive" >
                        <thead class="thead-dark">
                            <tr>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Краткое описание</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $row)
                            <tr>
                                <td>{{ $row->author }}</td>
                                <td>{{ $row->category }}</td>
                                <td>{{ $row->title }}</td>
                                <td><div style="max-height:120px;overflow-x:hidden">{{$row->descr}}</div></td>
                                <td>
                                    <a href="{{route('articleShow', $row->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i>Просмотр</a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$result->links()}}
                    @else
                    <p>Данные не найдены</p>
                    @endif
                </div>
            </div>
        </div>
    </div>@endsection  
</body>
</html>