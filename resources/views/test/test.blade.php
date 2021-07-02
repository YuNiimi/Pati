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

<div id="msg"></div>

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

    const arrayChunk = ([...array], size = 1) => {
        return array.reduce((acc, value, index) => index % size ? acc : [...acc, array.slice(index, index + size)], []);
    }

    var cvs = document.getElementById('cvs1');
    var ctx = cvs.getContext('2d');
    var ImageData = ctx.getImageData(0, 0, cvs.width, cvs.height);
    var textarea = document.getElementById('textarea');

    var data = ImageData.data;
    console.log("width")
    console.log(cvs.width)
    console.log("height")
    console.log(cvs.height)
    console.log("kakezan")
    console.log(cvs.height*cvs.width)
    console.log("length")
    console.log(data.length)
    // textarea.value = data

    var chunks = new Array();
    //上から一列ずつに分割
    chunks = arrayChunk(data, cvs.width*4);
    console.log(arrayChunk(data, cvs.width*4));

    var max_depth = 0 

    for(var i=0;i<chunks.length;i++){
        for(var j=0;j<cvs.width*4;j+=4){
            // i行j列目のピクセルデータを４つずつ見る
            // 元のインデックス計算
            index = i*cvs.width*4 + j
            if(chunks[i][j]>=150&&chunks[i][j+1]<200&&chunks[i][j]<200){
                data[index] = 255-data[index];
                data[index+1] = 255-data[index+1];
                data[index+2] = 255-data[index+2];
                if(max_depth<i) max_depth = i
            }
        }
    }

    ctx.putImageData(ImageData,0,0)
    var one_block_height = cvs.height/4
    console.log(max_depth)
    console.log(one_block_height)
    var answer = 30000*(max_depth%one_block_height/one_block_height )
    console.log(answer)
    // for(var i=0;i<data.length; i+=4){
    //     data[i]     = 255 - data[i];     // red
    //   data[i + 1] = 255 - data[i + 1]; // green
    //   data[i + 2] = 255 - data[i + 2]; // blue
    // }
    // ctx.putImageData(ImageData, 0, 0);

}

//テスト用
function RGB2bgColor(r,g,b) {
 
 r = r.toString(16);
 if (r.length == 1) r = "0" + r;

 g = g.toString(16);
 if (g.length == 1) g = "0" + g;

 b = b.toString(16);
 if (b.length == 1) b = "0" + b;

 return '#' + r + g + b;  
}  

var canvas = document.getElementById('cvs1');

canvas.onclick = function(evt){
var ctx = canvas.getContext('2d');
  

  //  マウス座標の取得
  var x = parseInt(evt.offsetX);
  var y = parseInt(evt.offsetY);

  //  指定座標のImageDataオブジェクトの取得 
  var imagedata = ctx.getImageData(x, y, 1, 1);

  //  RGBAの取得
  var r = imagedata.data[0];        
  var g = imagedata.data[1];
  var b = imagedata.data[2];
  var a = imagedata.data[3];
  
  canvas.style.backgroundColor = RGB2bgColor(r,g,b);
  document.getElementById("msg").innerHTML = 
    "Red: " + r + "  Green: " + g + "  Blue: " + b + "  Alpha: " + a;    
}



</script>

@endsection