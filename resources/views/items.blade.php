@extends('layouts.app')

@section('content')

<script src="/vendor/ckeditor/ckeditor.js"></script>
	
<div class="basic1">
	<div class="basecont1">	
	
		@foreach($item as $item)
<h3><a href="../{{$page[0]->url}}" style="color: black">{{$page[0]->nameM}}</a> <i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo mb_substr($item->nameItem,0,80,'UTF-8');?>...</h3>	
		<h3 style="text-align: center; font-weight: bold;">{{$item->nameItem}}</h3>
		{!!$item->textItem!!} <a href="../{{$page[0]->url}}">назад к списку</a>
		<span>@if(isset($item->file))<a href="/getfile{{$item->id_items}}" target="_blanck" style="color: rgb(51, 51, 51)
; font-weight: normal;"><button>Скачать</button></a>@endif</span>
		
		@endforeach
		</div>
		</div>
		
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