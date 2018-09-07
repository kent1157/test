@extends('layouts.app')

@section('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>



<div class="basic1">
	<div class="basecont1">	
		<div class="cont">
		<h1>Настройки</h1>
			
       <div class="leftcont">
        {!! Form::open(['url' => 'saveprop','class' => 'aome','id' => 'prop']) !!}
        <h2>Задать домашнюю страницу:</h2>
        	<ul>
        		@if(isset($arr))
        		@foreach($arr as $menu)
        		<li style="list-style-type: none;">
        			@if($menu->basic==1) 
        			<input type="radio" id="id{{$menu->id}}" name="act" value="{{$menu->id}}" checked="">
        			@else
        			<input type="radio" id="id{{$menu->id}}" name="act" value="{{$menu->id}}">
        			@endif
        			<label for="id{{$menu->id}}">{{$menu->nameM}}</label>
        		</li>
        		@endforeach
        		@endif
        		<li style="list-style-type: none;"> 
        			@if(count($act)>0)
        			<input type="radio" id="idd" name="act" value="cont" >
        			@else
        			<input type="radio" id="idd" name="act" value="cont" checked="">
        			@endif
        			<label for="idd">Контакты</label>
        			
        		</li>
        	</ul>
        	
        <input type="submit" name="" style="" value="Сохранить">
        {!! Form::close() !!}

        <h2>Добавить документ</h2>
        {!! Form::open(['url' => 'dbfile','class' => 'aome','files'=>'true']) !!}
        <label> Имя файла </label>
        <input type="text" name="namefile" style="margin:10px">
		 <input type="file" name="file" class="button7but">
			{!! Form::submit('Загрузить', ['class' => 'button7but','files' => true]) !!}
        {!! Form::close() !!}
         @if(strlen($file)>1)
        <br><br><h4>Каталог загруженных файлов:</h4>
        @foreach($file as $file)
        <div class="form-group" style="width: 90%;    box-shadow: 0 2px 4px rgba(0, 0, 0, .25); padding: 10px;">
        	{!! Form::open(['url' => 'delfile','id'=>'delfile1'.$file->idfile.'','class' => 'aome']) !!}
<input type="hidden" name="idfile" value="{{$file->idfile}}">
			<i id="delfile{{$file->idfile}}" class=" fa fa-times-circle" aria-hidden="true" style="float: right; color: red; cursor: pointer;"></i>

			<script>
                                            document.getElementById("delfile{{$file->idfile}}").onclick = function() {
                                                result=confirm('Удалить картинку?');
                                                if(result == true){
                                                document.getElementById("delfile1{{$file->idfile}}").submit();
                                              }
                                            }

                                         
                                            </script>
                                            <script type="text/javascript">
                                            	document.getElementById("СcopyButton1{{$file->idfile}}").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("СcopyTarget1{{$file->idfile}}"), "msg");
});



(function(){
new Clipboard('#СcopyButton1{{$file->idfile}}');
})();
	
                                            </script>
			{!! Form::close() !!}
			<h4><b>Имя файла:</b>{{$file->namefile}}</h4>
			<label>ссылка на файл: </label>
					<input id="СcopyTarget1{{$file->idfile}}" style="width: auto" type="text" name="" value="http://<?php echo $_SERVER['HTTP_HOST'];?>{{$file->file}}"><button id="СcopyButton1{{$file->idfile}}" data-clipboard-target="#СcopyTarget1{{$file->idfile}}">Copy</button>
        </div>
        @endforeach
        @endif
    </div>
	</div>
	<div class="leftcont">
		<h2>Загрузить картинку:</h2>
		{!! Form::open(['url' => 'dbimg','class' => 'aome','files'=>'true']) !!}

		 <input type="file" name="img" class="button7but" accept="image/*">
			{!! Form::submit('Загрузить', ['class' => 'button7but','files' => true]) !!}
        {!! Form::close() !!}

        @if((count($img))>0)
        <br><br><h4>Каталог загруженных картинок:</h4>
        @foreach($img as $img)
        
<div class="form-group" style="width: 100%;    box-shadow: 0 2px 4px rgba(0, 0, 0, .25); padding: 10px;">
	{!! Form::open(['url' => 'delimage','id'=>'delImg'.$img->idimg.'','class' => 'aome']) !!}
			<input type="hidden" name="idimg" value="{{$img->idimg}}">
			<i id="del{{$img->idimg}}" class=" fa fa-times-circle" aria-hidden="true" style="float: right; color: red; cursor: pointer;"></i>
			<script>
                                            document.getElementById("del{{$img->idimg}}").onclick = function() {
                                                result=confirm('Удалить картинку?');
                                                if(result == true){
                                                document.getElementById("delImg{{$img->idimg}}").submit();
                                              }
                                            }

                                         
                                            </script>
                                            <script type="text/javascript">
                                            	document.getElementById("copyButton{{$img->idimg}}").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget{{$img->idimg}}"), "msg");
});




                                            </script>
			{!! Form::close() !!}

					<label>ссылка на картинку: </label>
					<input id="copyTarget{{$img->idimg}}" style="width: auto" type="text" name="" value="http://<?php echo $_SERVER['HTTP_HOST'];?>{{$img->image}}"><button id="copyButton{{$img->idimg}}" data-clipboard-target="#copyTarget{{$img->idimg}}">Copy</button>
					<img style="max-width: 400px; max-height: 300px;margin: 0 auto; display: block; padding-top:10px;" src="{{$img->image}}">
			</div>
			<script type="text/javascript">
				(function(){
new Clipboard('#copyButton{{$img->idimg}}');
})();

		</script>
			@endforeach
        @endif

	</div>
</div>
</div>

		
<style type="text/css">
.cont{
	height: 100%;
}
.button7but{
	float: left;

}

.leftcont{
	width: 50%;
	float: left;
	position: relative;

}
p{
	font-size: 15px;
}
@media all and (max-width: 800px) {
	.cont{
	display: flex;
	flex-wrap: wrap;
	flex-flow: column;
	height: 100%;
	position: relative;
	width: 100%;



}
.leftcont{
	width: 100% !important;
	height: 100%;
		float: left;
}

.basecont{
	width: 100%;
	height: 100%;
	margin-top: 50px;
	padding: 10px;
}
.basecont1{
	width: 100% !important;
	height: 100% !important;
	margin-top: 50px;
	padding: 10px;
}


.form-group{
	width: 100%;
	flex-wrap: wrap;
	
}
}
.ch{
	margin: 0px !important;
	border: none !important;
	box-shadow: none;
}
.ch1 input:active, .ch1 input:hover, .ch1 input:focus {
    outline: 0;
    outline-offset: 0;
}
	.basic{
		
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.basic1{
		
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.basecont{
		width: 850px;
		min-height: 500px;
		display: flex;

	}
	.basecont1{
		width: 850px;
		min-height: 500px;

	}
	.form-group{
		float: left;
		margin-right: 20px;
	}


</style>

@endsection