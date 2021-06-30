@extends('layouts.parent')
@section('title', '店舗マスタ')

@include('layouts.header')
 
@section('content')
<body class="container">
<div class="mt-4 border bg-light p-2">
    <div>
        <h2>・店舗リスト</h2>
        <table class="table w-100 mt-4 table-bordered">
        <thead class="thead-dark">
            <tr>
            <th>store_id</th>
            <th>store_code</th>
            <th>name</th>
            <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <form method="POST" action="/master/store/edit">
            @csrf
                    @foreach($stores as $data)
                    <tr>
                        <td class="align-middle">{{$data->id}}<input class="form-control" type="hidden" name="edit_store_ids[]" id="edit_id" value ="{{$data->id}}" ></td>
                        <td><input class="form-control w-50" type="text" name="edit_store_codes[]" id="" value ="{{$data->code}}" ></td>
                        <td><input class="form-control" type="text" name="edit_names[]" id="edit_name" value ="{{$data->name}}" ></td>
                        <td class="align-middle"><a class="text-primary" href="/master/{{ $data->id}}/slot">機種登録</a></td>
                    </tr>
                    @endforeach
        </tbody>
        </table>
        <button type="submit" class="btn btn-primary float-right">更新</button>
        </form>
        <br>
        <br>
    </div>
</br>
<div class=" bg-light p-2">
        <h2>・店舗追加</h2>
            <form method="POST" action="/master/store/create">
        @csrf
        <div>
            <label for="form-name" class="form-label">store_code</label>
            <input class="form-control" type="text" name="code" id="form-name" >
        </div>

        <div>
            <label for="form-tel" class="form-label">name</label>
            <input class="form-control" type="text" name="name" id="form-tel">
        </div>

        <button type="submit" class="float-right mt-2 btn btn-primary">追加</button>
        <br>
        <br>
        </form>
    </div>
</div>

@endsection