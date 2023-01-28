@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="container">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('lesson.update', $lesson->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить</h5>
                    <a href="{{route('lesson.index')}}" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </a>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" id="exampleInput" value="{{$lesson->name}}">
                    @error('name')
                      <p class="text-danger">Укажите название</p>
                    @enderror
                  </div>
                  <div class="modal-body">
                      <label for="type_id" class="form-label">Семестр</label>
                          <select class="form-select" aria-label="Default select example" id="semester_id" name="semester_id">
                              @foreach ($semesters as $semester)
                                  <option
                                  {{$lesson->semester_id === $semester->id ? 'selected' : ''}}
                                  value={{$semester->id}}>{{$semester->name}}</option>
                              @endforeach
                          </select>
                  </div>
                  <div class="modal-body">
                            <label for="summernote1" class="form-label">Текст</label>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="summernote1">{{$lesson->content}}</textarea>
                            @error('content')
                                <p class="text-danger">пожалуйста, заполните это поле</p>
                            @enderror
                        </div>
                  <div class="modal-body">
                      <label for="exampleInputFile" class="form-label">Изображение</label>
                      <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="{{asset($lesson->image)}}"  alt="image">
                    </div>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image" value="{{old('image')}}">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                  </div>
                  <div class="modal-footer">
                    <a href="{{route('lesson.index')}}" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection


