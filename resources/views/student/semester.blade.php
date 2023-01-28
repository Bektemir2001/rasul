@extends('layouts.main_profil')
@section('content')
      <div class="container-md pt-5 pb-5">
        <div class="section__semestr p-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Семестры </th>
                <th>Предметы</th>
              </tr>
            </thead>
            <tbody class="table-bordered__list">
              @foreach($semesters as $semester)
              <tr>
                <td rowspan="{{count($semester->lesson)+1}}">{{$semester->name}}</td>
                @if(count($semester->lesson))
                <td bgcolor="#ccc"> <a href="{{route('items_details', $semester->lesson[0]->id)}}">{{$semester->lesson[0]->name}}</a></td>
                @else
                <td></td>
                @endif
              <tr>
              @for($i = 1; $i < count($semester->lesson); $i++)
		<tr>
                <td bgcolor="#ccc"> <a href="{{route('items_details', $semester->lesson[$i]->id)}}">{{$semester->lesson[$i]->name}}</a></td>
		</tr>
              @endfor
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection
