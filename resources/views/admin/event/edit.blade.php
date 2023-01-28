@extends('layouts.main_admin')
@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="container">
          <form action="{{route('event.update', $event->id)}}" method="POST" enctype="multipart/form-data">
            @method('patch')
              @csrf
              <div class="form-group">
                <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                <a href="{{route('event.index')}}" class="close">
                  <span aria-hidden="true">&times;</span>
                </a>
              </div>
              <div class="form-group">
                <label for="exampleInput" class="form-label">Название</label>
                <input type="text" class="form-control col-6" name="name" id="exampleInput" value="{{$event->name}}" required autofocus oninvalid="this.setCostomValidity('пожалуйста, заполните это поле')" oninput="this.setCostomValidity('')">
                @error('name')
                  <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="form-group">
                  <label>Текст</label>
                  <textarea name="content" id="ckeditor" required autofocus oninvalid="this.setCostomValidity('пожалуйста, заполните это поле')" oninput="this.setCostomValidity('')">{{$event->content}}</textarea>
                  @error('content')
                      <p class="text-danger"> {{$message}} </p>
                  @enderror
                </div>

            <div class="form-group col-6">
                <label>Изображение для предварительного просмотра</label>
                <div class="col-sm-6">
                    <img class="img-fluid mb-3" src="{{asset($event->image_preview)}}"  alt="image">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image_preview">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
                @error('image_preview')
                <p class="text-danger">{{$message}}</p>
                @enderror
          </div>
              <div class="modal-footer">
                <a href="{{route('event.index')}}" class="btn btn-secondary">Отменить</a>
                <button type="submit" class="btn btn-primary">Сохранить</button>
              </div>
          </form>

        </div>
      </div>
</div>
<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    var editor = CKEDITOR.replace( 'ckeditor',{
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
      } );
</script>
@endsection


