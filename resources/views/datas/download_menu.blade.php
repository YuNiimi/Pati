@extends('layouts.parent')
@section('title', 'ダウンロードメニュー')

@include('layouts.header')
 
@section('content')
    <button>全件ダウンロード</button>
    <button>絞り込みダウンロード</button>
    
    <form action="">
    
    @csrf
        <input type="hidden" name="flag">
        <div>
            <label for="form-name" class="form-label">店舗</label>
            <input class="form-control" type="text" name="code" id="form-name" >
            <!-- @php
    $job_name_loop = [
        ''      => '選択してください' ,
        '公務員' => '公務員' ,
        '医師'   => '医師' ,
        '弁護士' => '弁護士' ,
    ];
    @endphp
    {{ Form::select('job_name', $job_name_loop, old('job_name'), ['class' => 'my_class']) }} -->
        </div>   
        <div>
            <label for="form-start" class="form-label">start</label>
            <input class="form-control" type="date" name="start" id="form-start" >
        </div>
        <div>
            <label for="form-end" class="form-label">end</label>
            <input class="form-control" type="date" name="end" id="form-end" >
        </div>
    </form>
    
@endsection