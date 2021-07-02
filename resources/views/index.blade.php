@extends('layouts.parent')
@section('title', 'インデックスページ')

@include('layouts.header')
 
@section('content')
<div class="container">
    <table class="table w-80 mt-4">
        <tr>
            <td><a style="width:100%; height:100%; display:block;" href="/data">
                ・スクレイピング実行
            </a></td>
        </tr>
        <tr>
            <td><a style="width:100%; height:100%; display:block;" href="/master">
                ・マスタ
            </a></td>
        </tr>
        <tr>
            <td><a style="width:100%; height:100%; display:block;" href="/datas/index">
                ・データ閲覧
            </a></td>
        </tr>
        <tr>
            <td><a style="width:100%; height:100%; display:block;" href="/datas/download">
            ・データダウンロード（csv）
            </a></td>
        </tr>
        <tr>
            <td><a style="width:100%; height:100%; display:block;" href="/test">
            画像テスト
            </a></td>
        </tr>
    </table>
</div>

@endsection