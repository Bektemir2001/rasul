@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">

            <h3 class="profile-username text-center">{{$test->name}}</h3>
            <div>
                <div>
                    <h5 class="text-center"><b>предмет:  </b>{{$test->lesson->name}} </h5>
                    @if($test->lesson->semester->gender == 'male')
                        <h6 class="text-center"><b>раздел:  </b>Мужской</h6>
                    @else
                        <h6 class="text-center"><b>раздел: </b>Женский</h6>
                    @endif
                </div>
                <div>
                    @if(session('test_notification'))
                        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
                            <ul>
                                <li>{{session('test_notification')}}</li>
                            </ul>
                        </div>
                    @endif
                        <button class="btn btn-success" id="startTest" style="margin-left:80%;" type="button" onclick="startTest()">Начать тест</button>
                        <div class="d-none" id="give_succes_for_test">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <form action="{{route('test.give.access', $test->id)}}" method="POST">
                                      @csrf
                                      <div class="modal-body">
                                        <label for="exampleInput" class="form-label">продолжительность теста(мин)</label>
                                        <input type="text" class="form-control" name="time" id="exampleInput" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                        @error('time')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                      </div>
                                      <div class="modal-body">
                                          <label class="form-label">Форма обучения</label>
                                          <select class="form-select" id="type_id" onchange="filter_s()">
                                                @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                          </select>
                                      </div>
                                      <div class="modal-body">
                                          <label class="form-label">Курсы</label>
                                          <select class="form-select" id="level_id" onchange="filter_s()" required autofocus oninvalid="this.setCustomValidity('Выберите курс')" oninput="this.setCustomValidity('')">
                                                <option value=""></option>
                                                <option value="1">1-курс</option>
                                                <option value="2">2-курс</option>
                                                <option value="3">3-курс</option>
                                                <option value="4">4-курс</option>
                                          </select>
                                      </div>
                                      <div class="modal-body">
                                          <div id="students">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                          <b>Выберите курс</b>
                                                    </div>
                                                </li>
                                            </ul>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancelTest()">Отменить</button>
                                        <button type="submit" class="btn btn-primary">Начать</button>
                                      </div>
                                    </form>

                              </div>
                            </div>
                          </div>
                </div>
            </div>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">

                @if (session('ErrorWithAddQuestion'))
                    <div class="d-none" id="ErrorWithAddQuestion"></div>
                @endif

                <button class="btn btn-primary" id="addQuestion" type="button" onclick="openAddQuestionWindow()">Добавить вопрос</button>
                <div class="d-none" id="addQuestionForm">
                    <div class="container">
                        <form action="{{route('test.add.question', $test->id)}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="surname" class="form-label">Вапрос</label>
                                <div class="col-md-6" >
                                    <textarea id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{ old('question') }}</textarea>
                                </div>
                                @error('question')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="first_answer" class="form-label">Первый вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="first_answer" type="text" class="form-control @error('first_answer') is-invalid @enderror" name="first_answer" value="{{ old('first_answer') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;" >
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="1">
                                    </div>
                                </div>
                                @error('first_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="second_answer" class="form-label">Второй вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="scond_answer" type="text" class="form-control @error('second_answer') is-invalid @enderror" name="second_answer" value="{{ old('second_answer') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="2">
                                    </div>
                                </div>
                                @error('second_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="third_answer" class="form-label">Третьий вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="third_answer" type="text" class="form-control @error('third_answer') is-invalid @enderror" name="third_answer" value="{{ old('third_answer') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="3">
                                    </div>
                                </div>
                                @error('third_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="score" class="form-label">Балл</label>
                                    <div class="col-md-6">
                                        <input id="score" type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ old('score') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    @error('score')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            @error('right_answer')
                                <h4 class="text-danger">{{$message}}</h4>
                            @enderror
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeAddQuestionWindow()">Отменить</button>
                                <button type="submit" class="btn btn-primary">
                                    Дабовить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
              </li>
              @foreach ($questions as $question)
                <li class="list-group-item">
                    <div class="{{session('ErrorWithQuestion'.$question->id) ? 'd-none' : 'container'}}" id="{{"question" . $question->id}}">
                        <h3>{{$question->question}}</h3>
                        <h5><b>{{"a) "}}</b>{{$question->first_answer}}</h5>
                        <h5><b>{{"b) "}}</b>{{$question->second_answer}}</h5>
                        <h5><b>{{"c) "}}</b>{{$question->third_answer}}</h5>

                        <div>
                            <p class="text-success">Правильный ответ</p>
                            @if ($question->right_answer == 1)
                            <h5 class="text-primary"><b>{{"a) "}}</b>{{$question->first_answer}}</h5>
                            @elseif ($question->right_answer == 2)
                            <h5 class="text-primary"><b>{{"b) "}}</b>{{$question->second_answer}}</h5>
                            @else
                            <h5 class="text-primary"><b>{{"c) "}}</b>{{$question->third_answer}}</h5>
                            @endif
                        </div>
                        <div style="margin-left: 70%">
                            <div style="float: left;
                            display: block;
                            width: 40%;">
                                <button class="btn btn-primary" onclick="changeQuestion({{$question->id}})">Изменить</button>
                            </div>
                            <div style="float: left;
                            display: block;
                            width: 40%;">
                                <form action="{{route('test.question.delete', $question->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button title="submit" class="btn btn-secondary">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="d-none" id="{{"changeQuestion" . $question->id}}">
                        <form action="{{route('test.change.question', $question->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <label for="surname" class="form-label">Вапрос</label>
                                <div class="col-md-6" >
                                    <textarea id="question" type="text" class="form-control" name="question" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{$question->question}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="first_answer" class="form-label">Первый вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="first_answer" type="text" class="form-control" name="first_answer" value="{{ $question->first_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;" >
                                        <input class="form-check-input" type="radio" name="right_answer" id="flexRadioDefault1" value="1" {{$question->right_answer == 1 ? 'checked':''}}>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="second_answer" class="form-label">Второй вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="scond_answer" type="text" class="form-control" name="second_answer" value="{{ $question->second_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input" type="radio" name="right_answer" id="flexRadioDefault1" value="2" {{$question->right_answer == 2 ? 'checked':''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="third_answer" class="form-label">Третьий вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="third_answer" type="text" class="form-control" name="third_answer" value="{{ $question->third_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input" type="radio" name="right_answer" id="flexRadioDefault1" value="3" {{$question->right_answer == 3 ? 'checked':''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="score" class="form-label">Балл</label>
                                    <div class="col-md-6">
                                        <input id="score" type="text" class="form-control" name="score" value="{{ $question->score }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                            </div>
                            <input type="text" class="d-none" name="id" value="{{$question->id}}"/>
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChangeQuestionWindow({{$question->id}})">Отменить</button>
                                <button type="submit" class="btn btn-primary">
                                    Изменить
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Error window --}}
                    @if(session('ErrorWithQuestion'.$question->id))
                    <div class="container" id="{{"errorQuestion" . $question->id}}">
                        <form action="{{route('test.change.question', $question->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <label for="question" class="form-label">Вапрос</label>
                                <div class="col-md-6" >
                                    <textarea id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{$question->question}}</textarea>
                                </div>
                                @error('question')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="first_answer" class="form-label">Первый вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="first_answer" type="text" class="form-control @error('first_answer') is-invalid @enderror" name="first_answer" value="{{ $question->first_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;" >
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="1" {{$question->right_answer == 1 ? 'checked':''}}>
                                    </div>
                                </div>
                                @error('first_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="second_answer" class="form-label">Второй вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="scond_answer" type="text" class="form-control @error('second_answer') is-invalid @enderror" name="second_answer" value="{{ $question->second_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="2" {{$question->right_answer == 2 ? 'checked':''}}>
                                    </div>
                                </div>
                                @error('second_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="third_answer" class="form-label">Третьий вариант</label>
                                <div>
                                    <div class="col-md-6" style="float: left;
                                    display: block;
                                    width: 80%;">
                                        <input id="third_answer" type="text" class="form-control @error('third_answer') is-invalid @enderror" name="third_answer" value="{{ $question->third_answer }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-check" style="float: left;
                                    display: block;
                                    width: 20%;">
                                        <input class="form-check-input @error('right_answer') is-invalid @enderror" type="radio" name="right_answer" id="flexRadioDefault1" value="3" {{$question->right_answer == 3 ? 'checked':''}}>
                                    </div>
                                </div>
                                @error('third_answer')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="score" class="form-label">Балл</label>
                                    <div class="col-md-6">
                                        <input id="score" type="text" class="form-control @error('third_answer') is-invalid @enderror" name="score" value="{{ $question->score }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                    </div>
                                    @error('score')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            @error('righi_answer')
                                <h4 class="danger">{{$message}}</h4>
                            @enderror
                            <input type="text" class="d-none" value="{{$question->id}}"/>
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeErrorQuestionWindow({{$question->id}})">Отменить</button>
                                <div class="d-none">{{session()->forget('ErrorWithQuestion'.$question->id)}}</div>
                                <button type="submit" class="btn btn-primary">
                                    Изменить
                                </button>
                            </div>
                        </form>
                    </div>
                    @endif
                </li>
              @endforeach

            </ul>

            <div style="float: left;display: block; width:15%;" class="text-center">
                <a href="{{route('test.edit', $test->id)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('test.delete', $test->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button title="submit" class="btn btn-secondary">
                        Удалить
                    </button>
                </form>
             </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>

</div>
<script type="text/javascript">
    
    function filter_s(){
        var students = document.getElementById('students');
        var type = document.getElementById('type_id');
        var level = document.getElementById('level_id');
        var s = document.getElementById('f_select_all');
        var select = document.getElementById('select_checkbox');
        $.ajax({
            url: "{{route('filter.students', ['_token' => 'csrf_token'])}}",
            data: {filter:level.value, test:{{$test->id}}, type:type.value},
            success: function(response){
                if(s){
                    if(select.checked){
                        select.click();
                    }
                    var select_box = '';
                }
                else{
                    var select_box = '<div id="f_select_all">\n<div class="form-check">\n<input class="form-check-input" type="checkbox" onclick="select_all()" id="select_checkbox">\n<label class="form-check-label" for="flexCheckDefault">Выбрать все</label>\n</div>\n</div>\n';
                }
                var i = 0;
                var n = response.length;
                var open = select_box+'<div id="students">\n<ul class="list-group list-group-unbordered mb-3">\n';
                var close = '</ul>\n</div>'
                var data = '';
                if(n > 0){
                    while(i < n){
                        data += '<li class="list-group-item">\n<div class="form-check">\n<input class="form-check-input" type="checkbox" value="'+response[i]['id']+'" id="student'+i+'" name="students['+i+']">\n<label class="form-check-label" for="flexCheckDefault">'+response[i]['surname']+" "+response[i]['name']+'</label></div><div><b>Статус: </b> '+response[i]['status']+' <b style="margin-left:20px;"> балл: </b> '+response[i]['score']+'</div>\n</li>'; 
                        i += 1;
                    }
                    students.outerHTML = open + data + close;  
                }
                else{
                    if(s){
                        s.outerHTML = '';
                    }
                    students.outerHTML = '<div id="students">\n<ul class="list-group list-group-unbordered mb-3">\n<li class="list-group-item">\n<div class="form-check"><b>Нет данных</b>\n</div>\n</li>\n</ul>\n</div>';
                }
            }
        });
    }

    function select_all(){
        var i = 0;
        var s = document.getElementById('select_checkbox');
        var el = document.getElementById('student'+i);
        if(s.checked){
           while(el){
                if(!el.checked){
                   el.click(); 
                }
                i += 1;
                el = document.getElementById('student'+i);
            } 
        }
        else{
            while(el){
                if(el.checked){
                   el.click(); 
                }
                i += 1;
                el = document.getElementById('student'+i);
            }
        }
        
    }
</script>
@endsection


