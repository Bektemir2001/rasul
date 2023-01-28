@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="container">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('semester.update', $semester->id)}}" method="POST">
                    @method('PATCH')
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить</h5>
                    <a href="{{route('semester.index')}}" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </a>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" id="exampleInput" value="{{$semester->name}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="modal-body">
                        <label class="form-label">Форма обучения</label>
                        <select class="form-select" name="type_id">
                            @foreach($types as $type)
                            <option value="{{$type->id}}"
                                {{$semester->type_id == $type->id ? 'selected' : ''}}>
                                {{$type->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('type_id')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                      </div>
                  <div class="modal-footer">
                    <a href="{{route('semester.index')}}" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
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


