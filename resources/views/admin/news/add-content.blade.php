@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row">
        <div class="form">
            <form method="POST" enctype="multipart/form-data" action="{{route('form')}}">
                <div class="form-group">
                    <label for="alias">Автор</label>
                    <input type="text" class="form-control" id="alias" name="author" placeholder="Автор" value="{{ old('author') }}"> <span style="color:red">{{ $errors->first('author') }}</span>
                </div>
				
				
				
				
				
				
                <div class="form-group">
                    <label for="sel1">Выберите категорию</label><select id="sel1"  class="form-control" name="category_id"  value="{{ old('category_id') }}" data-live-search="true">
                        <option value="" disabled="disabled" selected="selected">Выберите категорию</option>
						@foreach($categ as $cat)
						<option value="{{$cat->id}}">{{$cat->title}}</option>
						@endforeach
						
				
                    </select> <span style="color:red">{{ $errors->first('category_id') }}</span>
                </div>

				
				
				
				
				

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ old('title') }}"> <span style="color:red">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Краткое описание</label>
                    <textarea class="form-control" name="descr" placeholder="Краткое описание">{{ old('descr') }}</textarea> <span style="color:red">{{ $errors->first('descr') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Полный текст</label>
                    <textarea class="form-control" rows='23' name="body" placeholder="Полный текст">{{ old('body') }}</textarea><span style="color:red">{{ $errors->first('body') }}</span>
                </div>
                <label class="btn btn-default btn-file">
                    Загрузите изображение <input type="file" name="image" style="display: none;">
                </label><span style="color:red">{{ $errors->first('category') }}</span><br/><br/>
                <button type="submit" class="btn btn-primary">Отправить</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <hr>
</div> 
@endsection
</body>
</html>