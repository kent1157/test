@extends('layouts.app')

@section('content')

<script src="/vendor/ckeditor/ckeditor.js"></script>
	@if(auth()->check())
<div class="basic">
	<div class="basecont">
		@foreach($page as $page2)
		{!! Form::open(['url' => 'dellM','id' => 'dellM']) !!}
                    <input type="hidden" name="dellM" value="{{$page2->id}}">
                     <input type="submit" id="dellM" name="" value="Удалить" style=" position: absolute; margin-top: 17px; ">
                      {!! Form::close() !!}
                      @endforeach
	<script type="text/javascript">
		$( "#dellM" ).click(function() {
  result=confirm('Вы уверены, что хотите удалить раздел?');
  if(result ==  false){
                                                return false;
                                              }
});
	</script>
		@foreach($page as $page1)
		{!! Form::open(['url' => 'page','id' => 'form','files'=>'true']) !!}
		<input type="hidden" name="id" value="{{$page1->id}}">
		<h1 style="margin-left: 80px;">{{$page1->nameM}}  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>     
		</h1> 
			<div class="form-group">
					<label>Введите URL-адрес раздела(только латиница): </label>
					<input required="" class="form-control" type="text" name="url" placeholder="например News" value="{{$page1->url}}" onkeydown="return keyDown.call(this,event)" onchange="value = value.replace(/^\s+/,'')" pattern="^[a-zA-Z]+$">
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
					<input required="" class="form-control" type="text" name="nameMenu" placeholder="например Новости" value="{{$page1->nameM}}">
			</div>

			<div class="form-group ch1">
					<label>Установите активность раздела: </label>
					@if(($page1->onOff)==1)
					<input class="form-control ch" type="hidden" name="onOff" value="0" >
					<input class="form-control ch" type="checkbox" name="onOff" value="1" checked="">
					@else
					<input class="form-control ch" type="hidden" name="onOff" value="0" >
					<input class="form-control ch" type="checkbox" name="onOff" value="1">
					@endif
			</div>

			<div class="form-group" style="width: 100%">
					<label>Введите заголовок страницы(title): </label>
					<input class="form-control" type="text" name="title" style="width: 100%" required="" value="{{$page1->title}}">
			</div>

			<div class="form-group" style="width: 100%">
					<label>Введите описание вида деятельности/ виды услуг/ что представлено на странице: </label>
					<textarea name="discr" style="width: 100%; resize: none; height: 100px;" placeholder="Пример(страница с лупами в связном): В интернет-магазине Связной представлен широкий выбор увеличительных стекол. В нашем каталоге Вы можете подобрать лупу. Заказать и купить увеличительную лупу по привлекательной цене, можно в интернет-магазине – продажа осуществляется с доставкой по России."></textarea>
			</div>


			<div class="form-group" style="width: 100%; display: none;">
					<label>Введите заголовок первого уровня: </label>
					<input class="form-control" type="text" name="nameOne" value="{{$page1->Onebigname}}">
					<label>Введите заголовок второго уровня: </label>
					<input class="form-control" type="text" name="nameTow" value="{{$page1->towbigname}}">
			</div>


		
			<div class="form-group" style="width: 100%">
					<label>Введите основной текст раздела: </label>
					<textarea id="textarea" name="text" style="width: 100%; resize: none; min-height: 300px !important;">{{$page1->text}}</textarea>
			</div>
			<div class="form-group" style="width: 100%">
				<input type="file" name="img" class="button7but" accept="image/*" title="Добавить основное изображение страницы" >
			{!! Form::submit('Сохранить', ['class' => 'button7but','files' => true]) !!}
			</div>
			{!! Form::close() !!}
		

		</div>
		</div>
		
		<div class="basic2" style="display: flex;align-items: center;justify-content: center;">
			<div class="basecont2" style="height: 100% auto;width: 850px;">
				<h2>Добавить запись(новость/вопрос-ответ/шаблоны документов):</h2>
			{!! Form::open(['url' => 'saveitems','files'=>'true']) !!}
				<div class="form-group" style="width: 100%;">
						<label>Введите название(вопрос и тд.): </label>
						<input class="form-control" type="text" name="nameitems" required="">
						<input type="hidden" name="menuid" value="{{$page1->id}}">
				</div>


				<div class="form-group" style="width: 100%">
						<label>Введите текст записи(ответ..): </label>
						<textarea id="textarea" name="textitems" required="" style="width: 100%; resize: none; min-height: 300px !important;"></textarea>
				</div>

				<div class="form-group" style="width: 100%">
						<input type="file" name="file" class="button7but">
			{!! Form::submit('Сохранить', ['class' => 'button7but','files' => true]) !!}
				</div>
			{!! Form::close() !!}

			</div>
		</div>
	@endforeach	
	@endif
<script>
	/*
	CKEDITOR.replace("text",
{
     height: 400
});

	CKEDITOR.editorConfig = function(config) {
  
 
  // [ Left, Center, Right, Justified ]
  config.justifyClasses = [ 'rteleft', 'rtecenter', 'rteright', 'rtejustify' ];


}*/

$(document).ready(function(){
        CKEDITOR.replace(
            'text',
            {height: 400}
        );
    });

$(document).ready(function(){
        CKEDITOR.replace(
            'textitems',
            {height: 300}
        );
    });
				</script>		

<div class="basic1">
	<div class="basecont1">		
@foreach($page as $page2)
		<h1>{{$page2->nameM}}</h1>
		
		<h2>{{$page2->Onebigname}}</h2>
		<h3>{{$page2->towbigname}}</h3>
		<p>@if($page2->img==NULL)
			@else
			@if(auth()->check())
			{!! Form::open(['url' => 'dellImg','id'=>'delImg','class' => 'aome']) !!}
			<input type="hidden" name="iddel" value="{{$page2->id}}">
			<input type="hidden" name="urlNew" value="{{$page2->url}}">

			<i id="del{{$page2->id}}" class="fa-2x fa fa-times-circle" aria-hidden="true" style="float: right; color: red; cursor: pointer;"></i>
			<script>
                                            document.getElementById("del{{$page2->id}}").onclick = function() {
                                                result=confirm('Удалить картинку?');
                                                if(result == true){
                                                document.getElementById("delImg").submit();
                                              }
                                            }
                                            </script>
			{!! Form::close() !!}
			@endif
			<a target="_blanck" href="{{$page2->img}}"><img src="{{$page2->img}}" class="imgleft"></a>
			@endif
			{!!$page2->text!!}</p>
</div>
</div>
		@endforeach

		@if(isset($items))
		<div class="basic2" style="display: flex;align-items: center;justify-content: center;">
			<div class="basecont2" style="height: 100% auto;width: 850px;">
				@foreach($items as $items)
				<div class="item" style="display: none;">
				@if(auth()->check())
				{!! Form::open(['url' => 'delitem','id'=>'delitem'.$items->id_items.'','class' => 'aome']) !!}
			<input type="hidden" name="iditem" value="{{$items->id_items}}">

			<i id="dell{{$items->id_items}}" class="fa-2x fa fa-times-circle" aria-hidden="true" style="float: right; color: red; cursor: pointer;" title="Удалить"></i>

			<a href="edititem{{$items->id_items}}"><i class="fa-2x fa fa-pencil-square-o" aria-hidden="true" style="float: right; color: black; cursor: pointer; padding-right: 10px" title="Редактировать"></i></a>

			<script>
                                            document.getElementById("dell{{$items->id_items}}").onclick = function() {
                                                result=confirm('Удалить запись?');
                                                if(result == true){
                                                document.getElementById("delitem{{$items->id_items}}").submit();
                                              }
                                            }
                                            </script>
			{!! Form::close() !!}
				@endif
				
				<h3><a href="/items/{{$items->id_items}}"><?php $name=mb_substr($items->nameItem,0,170,'UTF-8'); echo $name;?>...</a></h3>
				<p><?php $text=strip_tags($items->textItem); echo mb_substr($text, 0, 601,'UTF-8');?><a href="/items/{{$items->id_items}}">...читать далее</a> </p>
				<span>@if(isset($items->file))<a href="/getfile{{$items->id_items}}" target="_blanck" style="color: rgb(51, 51, 51)
; font-weight: normal;"><button>Скачать</button></a>@endif</span>
				<hr>
			</div>
				@endforeach
				<div class="bt">
				 <input  class="button b-btn1 m-more1" id="id1" type="button" value="Показать далее" style="display: none;"></div>
			</div>
		</div>
		@endif

		<script>
			setTimeout(function () {
li=5;
  $('.basecont2 .item').hide();
  $('.basecont2 .item:lt('+li+')').show();
    $('.button').click(function() {
      li=li+5;
      $('.basecont2 .item:lt('+li+')').show();  
    });
    
    if($('.item').length>10){
    	 $('.button').show();
    }
   
   
}, 100); 
		
  
</script>
<style type="text/css">
.bt{
	display: flex;
	width: 100%;
	justify-content: center;
}
.b-btn1 {
    display: inline-block;
    padding: 6px 10px;
    text-align: center;
    font-size: 12px;
    color: #717171;
    border-radius: 3px;
      font-family: Verdana, sans-serif;
    cursor: pointer;
    border:none;
       background: #EDEFED;
        outline:none;
  }
  
.b-btn1.m-more1:hover{
  color: black;
  transition: all 0.4s ease;
  background: #f1f3f1;
}
table{
	width: 100% !important;
}
td,
th {
  padding: 10px;
}
.wd{
	width: 100% !important;
}
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
		display: flex;

	}
	.basecont1{
		width: 850px;

	}
	.form-group{
		float: left;
		margin-right: 20px;
	}


</style>

@endsection