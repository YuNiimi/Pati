@extends('layouts.parent')
@section('title', '店舗別マスタ')

@include('layouts.header')
 
@section('content')
<div class="mt-4 border bg-light p-2">
    <div>
    <h1>{{$name}}</h1>
    <br>
        <h2>・データ取得機種</h2>
        <table class="table w-100 mt-4 table-bordered">
        <thead class="thead-dark">
            <tr>
            <th>slots_id</th>
            <th>code(sis)</th>
            <th>name</th>
            <th>name_encode</th>
            <th>slot_detail</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <form method="POST" action="/master/store/slot/edit">
            @csrf
                <input type="hidden" name="store_id" value={{$store}}>
                    @foreach($datas as $data)
                    <tr>
                        <td  class="align-middle">{{$data->id}}<input class="form-control" type="hidden" name="edit_ids[]" id="edit_id" value ="{{$data->id}}" ></td>
                        <!-- <td>{{$data->sis}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->name_encode}}</td>
                        <td>{{$data->name_encode}}</td> -->
                        <td><input class="form-control w-50" type="text" name="edit_siss[]" id="edit_sis" value ="{{$data->sis}}" ></td>
                        <td><input class="form-control" type="text" name="edit_names[]" id="edit_name" value ="{{$data->name}}" ></td>
                        <td><input class="form-control" type="text" name="edit_name_encodes[]" id="edit_name_encode" value ="{{$data->name_encode}}" ></td>
                        <td  class="align-middle">detail_select</td>
                    </tr>
                    @endforeach
                    
            </form>
        </tbody>
        </table>
        <button type="submit" class="btn btn-primary float-right">更新</button>
        <br>
        <br>
    </div>
</br>
    <div class=" bg-light p-2">
        <h3>・スロット追加</h3>
            <form method="POST" action="/master/store/slot/create">
        @csrf
        <input type="hidden" name="store_id" value={{$store}}>
        <div>
            <label for="form-name" class="form-label">code(sis)</label>
            <input class="form-control" type="text" name="code" id="form-name" >
        </div>

        <div>
            <label for="form-tel" class="form-label">name</label>
            <input class="form-control" type="text" name="name" id="form-tel">
        </div>

        <div>
            <label for="form-email" class="form-label">name_encode</label>
            <input class="form-control" type="text" name="name_encode" id="form-email">
        </div>
        <button type="submit" class="float-right mt-2 btn btn-primary">追加</button>
        </form>
    </div>

    <div class="mt-4  bg-light p-2">
        <form method="POST" action="">
        <h3>・角台リスト(カンマ区切りで台番号を入力)</h3>
        <input class="form-control" type="text" name="corner_csv">

        <button type="submit" class="float-right mt-2 btn btn-primary">登録</button>
        </form>
    </div>
    <div class="mt-4 mb-4">
    </br>
    </div>

</div>
@endsection