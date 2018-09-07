@extends('layouts.app')

@section('content')





<div class="basic1">
	<div class="basecont1">	
		<div class="cont">
		<div class="leftcont">  <h1>Контакты</h1>
				<h3>Юридическая фирма "Рес-Лекс"</h3>
				<p>Москва, 3 Донской пр. дом 1 <br>
					Телефон: <a href="tel:+74959796000">+7 495 979-6000</a><br>
			Телефон/факс:  <a href="tel:+74959431690">+7 495 943-1690</a>,<a href="tel:+74959433560"> +7 495 943-3560</a><br>
			Эл. почта: <a href="mailto:info@bankrotctvo.com">info@bankrotctvo.com</a><br><br>

			Режим работы<br>
			С понедельника по пятницу — с 10:00 до 21:00,<br>
			в субботу — с 14:00 до 18:00
				</p>
				<span><b>Карта проезда к главному офису "Рес-Лекс"</b>
				</span>
        </div>
        {!! Form::open(['url' => 'mail','class' => 'aome','id' => 'mail']) !!}
        <div class="leftcont">
        	<h3>Форма обратной связи:<input type="submit" name="" style="font-size: 17px; float: right; padding: 5px;"></h3>
        	<div class="form-group" style="width: 100%">
					<label>Ваше имя:</label>
					<input class="form-control" type="text" name="nameU">
			</div>
			<div class="form-group" style="width: 100%">
					<label>Ваш e-mail:</label>
					<input class="form-control" type="text" name="emailU">
			</div>
			<div class="form-group" style="width: 100%;">
					<label>Текст обращения:</label>
					<textarea class="form-control" type="text" name="textU" style="height: 100px; resize: none;"></textarea>
			</div>
        	
        </div>
        {!! Form::close() !!}
    </div>
	<iframe title="КАРТА" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2247.7316018586434!2d37.59738621567064!3d55.711036980542204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b6f477c834d%3A0x5ffb8d772fa53577!2zMy3QuSDQlNC-0L3RgdC60L7QuSDQv9GALdC0LCAxLCDQnNC-0YHQutCy0LAsIDExNTQxOQ!5e0!3m2!1sru!2sru!4v1531486007116" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>

		
<style type="text/css">
.cont{
	height: 100%;
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