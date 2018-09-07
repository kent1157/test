@extends('layouts.app')

@section('content')

<script src="/vendor/ckeditor/ckeditor.js"></script>
	
<div class="basic1">
	<div class="basecont1">	
	
		@foreach($item as $item)
<h2>Редактирование записи:</h2>
			{!! Form::open(['url' => 'editI','files'=>'true']) !!}
				<div class="form-group" style="width: 100%;">
						<label>Введите название(вопрос и тд.): </label>
						<input class="form-control" type="text" name="nameitems" required="" value="{{$item->nameItem}}">
						<input type="hidden" name="id" value="{{$item->id_items}}">
				</div>


				<div class="form-group" style="width: 100%">
						<label>Введите текст записи(ответ..): </label>
						<textarea id="textarea" name="textitems" required="" style="width: 100%; resize: none; min-height: 300px !important;">{{$item->textItem}}</textarea>
				</div>

				<div class="form-group" style="width: 100%">
						<input type="file" name="file" class="button7but">
			{!! Form::submit('Сохранить', ['class' => 'button7but','files' => true]) !!}
				</div>
			{!! Form::close() !!}
		@endforeach
		</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
        CKEDITOR.replace(
            'textitems',
            {height: 300}
        );
    });</script>
		
<style type="text/css">
.basic2 a{
	color: #1a60e2;
}

.imgleft{
	float: right;
	margin:10px;
	width: 300px
}
.button7but{
	float: left;

}

@media all and (max-width: 800px) {
.basecont{
	width: 100%;
	height: 100%;
	margin-top: 50px;
	padding: 10px;
}
.basecont1, .basecont2{
	width: 100% !important;
	height: 100% !important;
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
	.basecont1, .basecont2{
		width: 850px;
		min-height: 500px;

	}
	.form-group{
		float: left;
		margin-right: 20px;
	}


</style>

@endsection