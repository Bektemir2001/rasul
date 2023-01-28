@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="mt-4 mb-4">
          <button type="button" class="btn btn-primary btn-sm" id="modalButton" onclick="openWindow()">Добавить Предмет</button>

          <!-- Create Modal -->
          <div class="d-none" id="createWindow">
            <div class="container" style="width: 80%; height:50%;">
              <div class="container">
                <form action="{{route('lesson.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="previews"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить Предмет</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInput" class="form-label">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInput" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="modal-body">
                        <label for="type_id" class="form-label">Форма обучения</label>
                            <select class="form-select" aria-label="Default select example" id="semester_id" onchange="filterSemester(this.value)" required autofocus oninvalid="this.setCustomValidity('пожалуйста, выберите форма обучение')" oninput="this.setCustomValidity('')">
                                <option></option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="modal-body">
                        <label for="type_id" class="form-label">Семестр</label>
                        <select class="form-select" name="semester_id" required autofocus oninvalid="this.setCustomValidity('пожалуйста, выберите семестр')" id="semestersId">
                            <option >Выберите форма обучение</option>
                        </select>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Текст</label>
                        <textarea name="content" id="summernote"></textarea>
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputFile" class="form-label">Изображение</label>
                            <div class="custom-file">
                            <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror" id="exampleInputFile" name="image" value="{{old('image')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте фото')" oninput="this.setCustomValidity('')">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputFile" class="form-label">Файл</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control @error('files[]') is-invalid @enderror" id="exampleInputFile" name="files[]" value="{{old('file')}}" multiple required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте файл')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeWindow()">Отменить</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>

                </form>


              </div>
            </div>
          </div>
        </div>
        {{-- Create Modal --}}

        {{-- Error Modal --}}

        @if(count($errors))
        {{-- @dd($errors) --}}
        <div class="mt-4 mb-4">
            <button type="button" class="d-none" id="autoclick" onclick="openErrorWindow()"></button>

            <div class="d-none" id="errorWindow">
            <div class="container" style="width: 80%; height:50%;">
                <div class="container">
                    <form action="{{route('lesson.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="previews"></div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить Предмет</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeErrorWindow()">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="exampleInput" class="form-label">Название</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInput" value="{{old('name')}}"required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="modal-body">
                            <label for="type_id" class="form-label">Семестр</label>
                                <select class="form-select" aria-label="Default select example" id="type_id" name="semester_id">
                                    @foreach ($semesters as $semester)
                                        <option 
                                        {{old('semester_id') == $semester->id ? 'selected' : ''}}
                                         value="{{$semester->id}}">{{$semester->name}}</option>
                                        }
                                        }
                                    @endforeach
                                </select>
                        </div>
                        <div class="modal-body">
                            <label for="summernote1" class="form-label">Текст</label>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="summernote1">{{old('content')}}</textarea>
                            @error('content')
                                <p class="text-danger">пожалуйста, заполните это поле</p>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label for="exampleInputFile" class="form-label">Изображение</label>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror" id="exampleInputFile" name="image" value="{{old('image')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте фото')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="modal-body">
                            <label for="exampleInputFile" class="form-label">Файл</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control @error('files.*') is-invalid @enderror" id="exampleInputFile" name="files[]" value="{{old('files')}}" multiple required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте файл')" oninput="this.setCustomValidity('')">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @error('files.*')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeErrorWindow()">Отменить</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>

                    </form>

                </div>
              </div>
            </div>
          </div>
        @endif
        {{-- Error Modal --}}
        <div class="container">
        <h3 class="text-center">Предметы</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif

        <div class="demo-html" style="width: 100%;display: block;
        margin-left: auto;
        margin-right: auto;">
            <div id="example_wrapper" class="">
                <table id="example" class="table table-bordered border-primary" aria-describedby="example_info">
                    <thead>
                        <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;">
                            id
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                            Названия
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                            Семестр
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">
                            Раздел
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                            Форма обучения
                        </th>
                        <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">
                            Действие
                        </th>
                        {{-- <th width="2px"></th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                        <tr class="odd">
                            <td class="sorting_1">{{$lesson->id}}</td>
                            <td>{{$lesson->name}}</td>
                            <td>{{$lesson->semester->name}}</td>
                            @if($lesson->semester->gender == 'male')
                            <td>Мужской</td>
                            @else
                            <td>Женский</td>
                            @endif
                            <td>{{$lesson->semester->type->name}}</td>
                            <td>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('lesson.show', $lesson->id)}}"><i class="fas fa-eye"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('lesson.edit', $lesson->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <form action="{{route('lesson.delete', $lesson->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button title="submit" class="border-0 bg-transparent">
                                            <i title="submit" class="fas fa-trash text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </div>


                            </td>
                            {{-- td>rfed</td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>
        </div>
    </div>
    </div>


  </div>

<script type="text/javascript">
    function filterSemester(id){
        var semester = document.getElementById('semestersId');
        $.ajax({
            url: "{{route('lesson.filter.semester', ['_token' => 'csrf_token'])}}",
            data: {filter:id},
            success: function(response){
               var open = '<select class="form-select" name="semester_id" required autofocus id="semestersId">'
               var center = '';
               response.forEach(function(item){
                center += '<option value="'+item.id+'">'+item.name+'</option>\n';
               });
               var close = '</select>';
               semester.outerHTML = open+center+close;
           }
        });    
    }
</script>

@endsection

