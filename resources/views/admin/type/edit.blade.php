@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="container">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('type.update', $type->id)}}" method="POST">
                    @method('PATCH')
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить тип</h5>
                    <a href="{{route('type.index')}}" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </a>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название типа</label>
                    <input type="text" class="form-control" name="name" id="exampleInput" value="{{$type->name}}">
                  </div>
                  <div class="modal-footer">
                    <a href="{{route('type.index')}}" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
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


