@extends('layouts.parent')
@section('title', 'スクレイピング結果')

@include('layouts.header')
 
@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>店舗id</td>
                <td>店舗名</td>
                <td>機種名</td>
                <td>取得件数</td>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
                <tr>
                    <td>{{ $data["store_id"] }}</td>
                    <td><a class="text-primary" href="/master/{{ $data['store_id'] }}/slot">{{ $data["store"] }}</a></td>
                    <td>{{ $data["name"] }}</td>
                    <td>{{ $data["count"] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection