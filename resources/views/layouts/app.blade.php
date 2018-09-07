<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all" />
<meta name="yandex" content="all" />
@if(isset($discr))
<meta name="description" content="{{$discr[0]->discr}}" />
@endif
@if(isset($title))
    <title>РЕС-ЛЕКС: {{$title[0]->title}}</title>
    @else
    <title>РЕС-ЛЕКС</title>
    @endif
    <!-- Styles -->

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://use.fontawesome.com/1228817e63.js"></script>
    
    <!-- Scripts -->

    
    <script type="text/javascript" src="../js/required/script/jquery-1.11.0.min.js"></script>
    <script src="../js/app.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body  class="body-left" >
   
        <div class="header">
          <div class="header-container">
              <div class="logo">
                <a href="/"><img src="/logo_new.png" alt="" class="leftlogo"></a>
                
              </div>
              <style type="text/css">
.leftlogo{
  margin-top: 10px;
}
              </style>
              <div class="visits" style="flex-flow: column;">
                <a href="/"><img src="/20let.png" alt="" class="leftlogo"></a>
              <!-- <div class="auth">
                <style type="text/css">
                  .visits a{
                    color: black;
                    width: 20px;
                    text-align: center;
                    
                  }
                  .auth{
                    display: flex;
                    justify-content: space-between;
                    flex-flow: row;
                    width: 100%;
                  }
                  .aome1{
                    width: 0px;
                  }
                </style>
                 @if(auth()->check())
          <a href="#" onclick="$(this).closest('form').submit()">
                    {!! Form::open(['url' => 'addmenu','class' => 'aome1','id' => 'form']) !!}
                     
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                      {!! Form::close() !!}</a>
                     <a href="prop"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                      <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                      @else
                   <a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                   
                      @endif

               </div> -->
              </div>
              <div class="navigation">
                  <div class="navigation-primary">
                    <ul>
                      @if(isset($arr))
                      @foreach($arr as $arr1)
                       @if(auth()->check())

                      <li><a href="/{{$arr1->url}}" >{{$arr1->nameM}}</a></li>
                      @elseif(($arr1->onOff)==1)
                      <li><a href="/{{$arr1->url}}" >{{$arr1->nameM}}</a></li>
                      @endif
                      @endforeach
                      @endif
                      <li><a href="/contact">Контакты</a></li>
                      @if(auth()->check())
                    {!! Form::open(['url' => 'addmenu','class' => 'aome','id' => 'form']) !!}
                      <li><a href="#" onclick="$(this).closest('form').submit()">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i></a></li> 
                      {!! Form::close() !!}
                      <li><a href="prop"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
                      <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                      @else
                      <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                      @endif
              
                    </ul>
                  </div>
    
              </div>
          </div>



        </div>

        <div id="mobilemenu" class="container">

          <div id="nav-trigger">
            <span class="mobile-menu"></span>
            <a class="mob-logo"  href="/" title="РЕС-ЛЕКС">
             <h3>РЕС-ЛЕКС</h3>
             <h5>Сопровождение банкротства</h5>
            </a>
          </div>
          <style type="text/css">
            .mob-logo{
             top:10px !important;
            }
            .mob-logo h3{
              color: white;
              text-decoration:none;
              margin:0px !important;
             
              position: relative;
            }
            .mob-logo h5{
              color: white;
              text-decoration:none;
              margin:0px !important;
            
              position: relative;
            }
            #nav-trigger a{
              text-decoration:none;
            }
            .container {
              padding-left:0px !important;
              padding-right:0px !important;
            }

          </style>
          <nav id="nav-main">
            <ul>
              @if(isset($arr))
                @foreach($arr as $arr2)
                      <li><a href="/{{$arr2->url}}">{{$arr2->nameM}}</a></li>
                 @endforeach
                 @endif
                      <li><a href="/contact">Контакты</a></li>
                      @if(auth()->check())
                    {!! Form::open(['url' => 'addmenu','class' => 'aome','id' => 'form']) !!}
                      <li><a href="#" onclick="$(this).closest('form').submit()">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить раздел</a></li> 
                      {!! Form::close() !!}
                      <li><a href="prop"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
                      @endif
            </ul>
          </nav>
          <nav id="nav-mobile">
            <ul class="" style="display: none;">
                @if(isset($arr))
                @foreach($arr as $arr3)
                      <li><a href="/{{$arr3->url}}">{{$arr3->nameM}}</a></li>
                 @endforeach
                 @endif
                      <li><a href="/contact">Контакты</a></li>
                      @if(auth()->check())
                    {!! Form::open(['url' => 'addmenu','class' => 'aome','id' => 'form']) !!}
                      <li><a href="#" onclick="$(this).closest('form').submit()">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить раздел</a></li> 
                      {!! Form::close() !!}
                      <li><a href="prop"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
                      @endif

            </ul>
          </nav>
        </div>
<div class="cont1">

        @yield('content')
</div>

<footer>
<div class="footertop">
  <div class="botleft">
  <a href="/"><img src="/logo_new.png" alt="" class="leftlogobot"></a>
</div>

<div class="botleft mrgw"> <i class="fa fa-map-marker" aria-hidden="true"></i>
Наш адрес: Москва,<br> 3 Донской пр.<br> дом 1 
</div>

<div class="botleft mrgw">
  <i class="fa fa-lg fa-clock-o" style="color: black"></i> Режим работы:<br>
пн-пт - с 10:00 до 21:00<br>
сб - с 14:00 до 18:00
</div>
<div class="botleft tel">
  <a href="tel:+74959796000" style="color: rgb(51, 51, 51)
;"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> +7 (495) 979-60-00</a>
</div>

<div class="botleft tel">
  <a href="mailto:info@bankrotctvo.com" style="color: rgb(51, 51, 51)
;"><i class="fa fa-envelope" aria-hidden="true"></i> info@bankrotctvo.com</a>
</div>

</div>

  <div class="footerbot" style="color: rgb(51, 51, 51)
;">© 1995-2018 Независимая юридическая фирма "Рес-Лекс" Ведение дел о банкротстве</div>
</footer>
<style type="text/css">
.cont1{
  min-height: 100vh;
}
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}
h2 {
    display: block;
    font-size: 1.5em;
    margin-top: 0.83em;
    margin-bottom: 0.83em;
    margin-left: 0;
    margin-right: 0;
    padding: 0px;
}
h3 { 
    display: block;
    font-size: 1.17em;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
}

h4 { 
    display: block;
    font-size: 1em;
    margin-top: 1.33em;
    margin-bottom: 1.33em;
    margin-left: 0;
    margin-right: 0;
}

@media all and (max-width: 800px) {

 footer{
  display: flex;
  flex-flow: row;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
 }
  .footertop{
    position: relative;
    height: 100%;
    display: flex;
      justify-content: center;
      flex-flow: row;
  flex-wrap: wrap;
  }
  .footerbot{
  }
  .tel{
  margin-bottom: 15px !important;
}

}
.tel{
  font-size: 17px;
  text-align: center;
  margin-top: 45px;
}
.tel a{
  color: black;
}
.mrgw{
  margin-top: 28px;
}
.leftlogobot{
  margin-top: 40px;
}

.botleft{
  float: left;
  
  font-weight: bold;
  margin-right: 30px;
  margin-left: 30px;
}
  footer{
    width: 100%;
    position: relative;
    text-align: center;
    height: auto;
    bottom: 0px !important;
    
  }
  .footertop{
    width: 100%;
    min-height: 100px;
    background: #ebebeb;
    background: linear-gradient(to bottom, white, #ebebeb);
    display: flex;
    justify-content: space-around;
  }
  .footerbot{
    width: 100%;
    height: 50px;
    padding: 10px;
    text-align: center;

    background: #e5e5e5;
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;

  }
</style>

    <script type="text/javascript">
      
    $(document).ready(function(){
        $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });

    </script>
</body>
</html>
