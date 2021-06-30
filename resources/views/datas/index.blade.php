@extends('layouts.parent')
@section('title', 'データ閲覧')

@include('layouts.header')
 
@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>データid</td>
                <td>店舗id</td>
                <td>スロットid</td>
                <td>台番号</td>
                <td>bb</td>
                <td>rb</td>
                <td>games</td>
                <td>date</td>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
                <tr>
                @foreach($data as $el)
                    <td>{{$el}}</td>
                @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection