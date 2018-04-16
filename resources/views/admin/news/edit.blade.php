@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row">
        <div class="form">
            <form method="POST" action="{{route('edit', ['id' => $all->id ] ) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="alias">Автор</label>
                    <input type="text" class="form-control" id="alias" name="author" placeholder="Автор" value="{{$all->author}}"> <span style="color:red">{{ $errors->first('author') }}</span>
                </div>
                <div class="form-group">
                    <label for="sel1">Выберите категорию</label><select id="sel1" class="form-control" name="category"  data-live-search="true">
                        <option value="" disabled="disabled" selected="selected">Выберите категорию</option>
                        <option>Политика</option>
                        <option>Спорт</option>
                        <option>Наука</option>
                        <option>Финансы</option>
                        <option>Игры</option>
                        <option>Фильмы</option>
                    </select> <span style="color:red">{{ $errors->first('image') }}</span>

                </div>
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ $all->title }}"> <span style="color:red">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Краткое описание</label>
                    <textarea class="form-control" name="descr" placeholder="Краткое описание">{{$all->descr}}</textarea> <span style="color:red">{{ $errors->first('descr') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Полный текст</label>
                    <textarea class="form-control" rows='23' name="body" placeholder="Полный текст">{{$all->body}}</textarea><span style="color:red">{{ $errors->first('body') }}</span>
                </div>
                <label class="btn btn-default btn-file">
                    Загрузите изображение <input type="file" name="image" style="display: none;">
                </label><span style="color:red">{{ $errors->first('image') }}</span><br/><br/><button type="submit" class="btn btn-primary">Отправить</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; 2018 Сайт новостей</p>
    </footer>
</div> <!-- /container -->
@endsection