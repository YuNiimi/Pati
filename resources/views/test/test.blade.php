@extends('layouts.parent')
@section('title', 'test')

@include('layouts.header')
 
@section('content')
@csrf

<!-- 
test-params
https://p-tora.com/area2/smafo/hall/chart.php?tno=694&yy=2021&mm=07&dd=01&sis=1&dno=1&pt=1&design_type=6&v=1 

-->
<div>
    <img class="d-none" id="graph" src="https://p-tora.com/area2/smafo/hall/chart.php?tno=694&yy=2021&mm=07&dd=01&sis=1&dno=1&pt=1&design_type=6&v=1 " alt="">
</div>

<div>
<canvas id="cvs1">
</canvas>
<input type="button" value="read" onclick="imageDraw()">
<input type="button" value="analyse" onclick="analyse()">
</div>

<div>
<textarea name="" id="textarea" cols="30" rows="10"></textarea>
</div>



<script>
//画像をcanvasに描画する
function imageDraw(){
    var cvs = document.getElementById('cvs1');
    var ctx = cvs.getContext('2d');

    var img = new Image();
    img.src = 'chart.gif';

    img.onload = function(){
        var width = img.naturalWidth;
        var height = img.naturalHeight;
        cvs.width = width;
        cvs.height = height;
        ctx.drawImage(img,0,0, width, height);  //400x300に縮小表示
    }
}

function analyse(){
    var cvs = document.getElementById('cvs1');
    var ctx = cvs.getContext('2d');
    var ImageData = ctx.getImageData(0, 0, cvs.width, cvs.height);
    var textarea = document.getElementById('textarea');

    var data = ImageData.data;


    textarea.value = data

    for(var i=0;i<data.length; i+=4){
        data[i]     = 255 - data[i];     // red
      data[i + 1] = 255 - data[i + 1]; // green
      data[i + 2] = 255 - data[i + 2]; // blue
    }
    ctx.putImageData(ImageData, 0, 0);

}


</script>

@endsection