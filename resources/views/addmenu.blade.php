@extends('layouts.app')

@section('content')
<script src="/vendor/ckeditor/ckeditor.js"></script>

<br>
<div class="basic">
	<div class="basecont">
		{!! Form::open(['url' => 'savemenu','class' => 'aome','id' => 'form','files'=>'true']) !!}

		<h1>Создание раздела:</h1>
			<div class="form-group">
					<label>Введите URL-адрес раздела(только латиница): </label>
					<input required="" class="form-control" type="text" name="url" placeholder="например News" onkeydown="return keyDown.call(this,event)" onchange="value = value.replace(/^\s+/,'')" pattern="^[a-zA-Z]+$">
			</div>
			<script>

				function keyDown(e){
				  var position = 'selectionStart' in this ?
				    this.selectionStart :
				    Math.abs(document.selection.createRange().moveStart('character', -input.value.length)); //ie<9
				  if(e.keyCode === 32) return false
				}
		</script>

			<div class="form-group">
					<label>Введите название раздела: </label>
					<input class="form-control" type="text" name="nameMenu" placeholder="например Новости" required="">
			</div>

			<div class="form-group ch1">
					<label>Установите активность раздела: </label>
					<input class="form-control ch" type="hidden" name="onOff" value="0" >
					<input class="form-control ch" type="checkbox" name="onOff" value="1" >
			</div>


			<div class="form-group" style="width: 100%">
					<label>Введите заголовок страницы(title): </label>
					<input class="form-control" type="text" name="title" style="width: 100%" required="">
			</div>

			<div class="form-group" style="width: 100%">
					<label>Введите описание вида деятельности/ виды услуг/ что представлено на странице: </label>
					<textarea name="discr" style="width: 100%; resize: none; height: 100px;" placeholder="Пример(страница с лупами в связном): В интернет-магазине Связной представлен широкий выбор увеличительных стекол. В нашем каталоге Вы можете подобрать лупу. Заказать и купить увеличительную лупу по привлекательной цене, можно в интернет-магазине – продажа осуществляется с доставкой по России."></textarea>
			</div>


			<div class="form-group" style="width: 100%; display: none;">
					<label>Введите заголовок первого уровня: </label>
					<input class="form-control" type="text" name="nameOne">
					<label>Введите заголовок второго уровня: </label>
					<input class="form-control" type="text" name="nameTow">
			</div>

			<div class="form-group" style="width: 100%">
					<label>Введите основной текст раздела: </label>
					<textarea id="textarea" name="text" style="width: 100%; resize: none; min-height: 300px;"></textarea>
			</div>
			<div class="form-group" style="width: 100%;">
				<input type="file" name="img" class="button7but" accept="image/*" style="display: none;"> 
			{!! Form::submit('Сохранить', ['class' => 'button7but','files' => true]) !!}
			</div>
		{!! Form::close() !!}
		
	</div>
	<script>
			//CKEDITOR.replace( 'text' );
			CKEDITOR.replace("text",
{
     height: 300
});
		</script>		
</div>

<style type="text/css">
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
	.basecont{
		width: 850px;
		min-height: 500px;
		display: flex;
		flex-flow: row;

	}
	.form-group{
		float: left;
		margin-right: 20px;
	}


</style>

@endsection