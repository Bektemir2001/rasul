@extends('layouts.main_admin')
@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="container" id="createWindow">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('test.update', $test->id)}}" method="POST">
                    @method('PATCH')
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить Тест</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" id="exampleInput" value="{{$test->name}}">
                  </div>
                  <div class="modal-body">
                    <label for="lesson_id" class="form-label">Предмет</label>
                        <select class="form-select" aria-label="Default select example" id="lesson_id" name="lesson_id">
                            @foreach ($lessons as $lesson)
                                <option
                                    {{$test->lesson_id == $lesson->id ? 'selected':''}}
                                    value={{$lesson->id}}>{{$lesson->name}}
                                </option>
                            @endforeach
                        </select>
                </div>
                  <div class="modal-footer">
                    <a href="{{route('test.index')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
      </div>
</div>
@endsection


