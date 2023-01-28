@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <div class="container">
        <h3 class="text-center">Обратная связь</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
        <div class="container">
            <div class="demo-html">
                <div id="example_wrapper" class="">
                    <table id="example" class="table table-bordered border-primary" style="width: 100%;" aria-describedby="example_info">
                        <thead>
                            <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;">
                                id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                                Имя
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 25%;">
                                email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">
                                Статус
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25%;">
                                Действие
                            </th>
                            {{-- <th width="2px"></th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $item)
                            <tr>
                                <td class="sorting_1">{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                @if($item->status === 1)
                                    <td class="text-green">прочитано</td>
                                @else
                                    <td class="text-danger">не прочитано</td>
                                @endif
                                <td>
                                    <div style="float: left;
                                    display: block;
                                    width: 50%;" class="text-center">
                                        <a class="btn btn-primary" href="{{route('feedback.show', $item->id)}}">Смотреть</a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 50%;" class="text-center">
                                        <form action="{{route('feedback.delete', $item->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button title="submit" class="btn btn-danger">
                                                Удалить
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
</div>
@endsection
