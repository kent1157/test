<?php

namespace App\Http\Controllers;
require __DIR__.'/../../../vendor/autoload.php';
use App\User;
use App\Http\Controllers\Controller;
use Bolandish\Instagram;
use PHPStamp\Templator;
use PHPStamp\Document\WordDocument;
use Maatwebsite\Excel\Facades\Excel;
use App;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailer;
use Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $url=DB::table('menu')
            ->get();
   
       $act=DB::table('menu')
                ->where('basic',1)
                ->get();
              if(count($act)>0){  
                foreach ($act as $act) {
                
                    return  HomeController::getPage($act->url);
                }
              }
              else{
                    return view('contact',['arr'=>$url]);
              }
              
         
    }

    public function prop()
    {        
    if(Auth::check()){
       $url=DB::table('menu')->get();

        $act=DB::table('menu')
                ->where('basic',1)
                ->get();
                $img=DB::table('img')
                    ->latest()
                    ->get();
                    $file=DB::table('file')
                    ->latest()
                    ->get();
     //count($file)
        return view('prop',['arr'=>$url,'act'=>$act,'img'=>$img,'file'=>$file]);
    }
    else{
        return view('404');
    }
    }

     public function dellM()
    {
         $input=Request::all();
         DB::table('menu')
            ->where('id',$input['dellM'])
            ->delete();

            DB::table('items')
            ->where('menuid',$input['dellM'])
            ->delete();

         return HomeController::index();

     
    }

    public function saveprop()
    {
        $input=Request::all();
        $info=DB::table('menu')
            ->where('basic',1)
            ->get();
            if(count($info)>0){
                foreach ($info as $info) {
                  DB::table('menu')
                  ->where('id',$info->id)
                  ->update([
                    'basic'=>0
                  ]);
                }
                
            }
      DB::table('menu')
      ->where('id',$input['act'])
      ->update([
        'basic'=>1
      ]);
     // dd($url);
     
        return redirect()->back();
    }



    public function mail()
    {

         $input=Request::all();

        $to      = 'kent1157@bk.ru';
        $subject = $input['nameU'];
        $message = $input['textU'];
        $headers = 'From:'.$input['emailU'];

        mail($to, $subject, $message, $headers);
        
         return redirect()->back(); 
     
  
    }

    public function addmenu()
    {
         $url=DB::table('menu')->get();

     
        return view('addmenu',['arr'=>$url]);
    }

     public function savemenu(Request $Request)
    {
        
        $input=Request::all();

        if( Input::hasFile('img') ) {



        $name = $input['img']->getClientOriginalName();
        $ext= date('YmdHns');
        $file=$input['img'];
        $_filesname   = iconv("UTF-8", "windows-1251",$ext.$name);
        //$link = Input::file('img')->storeAs('../public/img', $_filesname);

        $link='../img/'.$ext.$name.'';

        $file->move('../public/img/',$_filesname);

     }
     else{
        $link=NULL;
     }
        
        DB::insert("insert into menu(
              url,
              nameM,
              onOff,
              Onebigname,
              towbigname,
              text,
              title,
              discr,
              img
              ) values (?,?,?,?,?,?,?,?,?)", [
                  $input['url'],
                  $input['nameMenu'],
                    $input['onOff'],
                  $input['nameOne'],
                  $input['nameTow'],
                  $input['text'],
                  $input['title'],
                  $input['discr'],
                  $link
              ]);
     
         return redirect()->route('home');    }

    public function getPage($slug)
    {

        $url=DB::table('menu')->get();
     

        $page=DB::table('menu')
        ->where('url',$slug)
        ->get();

        $title=DB::table('menu')
            ->where('url',$slug)
            ->select('title')
            ->get();

            $idmenu=DB::table('menu')
            ->where('url',$slug)
            ->select('id')
            ->get();
if(count($idmenu)>0){
            $items=DB::table('items')
                ->where('menuid',$idmenu[0]->id)
                ->latest()
                ->get();
              }
              else
              {
                $items=NULL;
              }

            $discr=DB::table('menu')
            ->where('url',$slug)
            ->select('discr')
            ->get();

            $discr=json_decode($discr);
           
             $title=json_decode($title);
              
        $page1=json_decode($page);


        if(Auth::check()){
            if((count($page))>0){
                return view('page',['arr'=>$url,'page'=>$page,'title'=>$title,'discr'=>$discr,'items'=>$items]);
            }
                else{
                    return view('404',['arr'=>$url]);
                }
        }
        else{
                if((count($page))>0 && $page1[0]->onOff==1){
                return view('page',['arr'=>$url,'page'=>$page,'title'=>$title,'discr'=>$discr,'items'=>$items]);
                }
                else{
                    return view('404',['arr'=>$url]);
                }
        }     
    }

    public function pageUpdate(){

        $input=Request::all();
      

        $title=DB::table('menu')
            ->where('id',$input['id'])
            ->select('title')
            ->get();

           $items=DB::table('items')
                ->where('menuid',$input['id'])
                ->latest()
                ->get();
             $title=json_decode($title);
   
      //  dd($input);

        if( Input::hasFile('img') ) {



        $name = $input['img']->getClientOriginalName();
        $ext= date('YmdHns');
        $file=$input['img'];
        $_filesname   = iconv("UTF-8", "windows-1251",$ext.$name);
        //$link = Input::file('img')->storeAs('../public/img', $_filesname);

        $link='../img/'.$ext.$name.'';

        $file->move('../public/img/',$_filesname);

      
 DB::table('menu')
            ->where('id',$input['id'])
            ->update([
                'url'=>$input['url'],
                'nameM'=>$input['nameMenu'],
                'onOff'=>$input['onOff'],
                'Onebigname'=>$input['nameOne'],
                'towbigname'=>$input['nameTow'],
                'text'=>$input['text'],
                'title'=>$input['title'],
                'discr'=>$input['discr'],
                'img'=>$link
            ]);
       

     }
     else{
        
        DB::table('menu')
            ->where('id',$input['id'])
            ->update([
                'url'=>$input['url'],
                'nameM'=>$input['nameMenu'],
                'onOff'=>$input['onOff'],
                'Onebigname'=>$input['nameOne'],
                'towbigname'=>$input['nameTow'],
                'text'=>$input['text'],
                'title'=>$input['title'],
                'discr'=>$input['discr'],
            ]);
     }

         $url=DB::table('menu')->get();
              $page=DB::table('menu')
                    ->where('url',$input['url'])
                    ->get();
            return view('page',['arr'=>$url,'page'=>$page,'title'=>$title,'items'=>$items]);

    }


 public function contact(){
     $url=DB::table('menu')->get();
    return view('contact',['arr'=>$url]);

 }

 public function delImg(){
    $input=Request::all();

     DB::table('menu')
            ->where('id',$input['iddel'])
            ->update([
                'img'=>NULL
            ]);
            $url=$input['urlNew'];
            return HomeController::getPage($url); 
 }

 public function dbimg(){
    $input=Request::all();

    $name = $input['img']->getClientOriginalName();
        $ext= date('YmdHns');
        $file=$input['img'];
        $_filesname   = iconv("UTF-8", "windows-1251",$ext.$name);
        //$link = Input::file('img')->storeAs('../public/img', $_filesname);

        $link='/img/'.$ext.$name.'';

        $file->move('../public/img/',$_filesname);

    DB::table('img')->insert(
  ['image' => $link]
);
    
               return redirect()->back(); 
 }

 public function dbfile(){
$input=Request::all();
$name = $input['file']->getClientOriginalName();
        $ext= date('YmdHns');
        $file=$input['file'];
        $_filesname   = iconv("UTF-8", "windows-1251",$name.$ext);
        //$link = Input::file('img')->storeAs('../public/img', $_filesname);

        $link='/file/'.$name.$ext.'';

        $file->move('../public/file/',$_filesname);
           DB::table('file')->insert(
  ['file' => $link,
    'namefile'=>$input['namefile']]
);
    
               return redirect()->back(); 

 }

 public function delimage(){
    $input=Request::all();
  //dd($input);


$file=DB::table('img')
        ->where('idimg',$input['idimg'])
        ->select('image')
        ->get();
       // $file=json_decode($file);

//dd($file[0]->image);
DB::table('img')
            ->where('idimg',$input['idimg'])
            ->delete();
    Storage::delete($file[0]->image);
    
               return redirect()->back(); 
 }

 public function delfile(){
    $input=Request::all();
   dd($input);

$file=DB::table('file')
        ->where('idfile',$input['idfile'])
        ->select('file')
        ->get();
    //    $file=json_decode($file);

DB::table('file')
            ->where('idfile',$input['idfile'])
            ->delete();
    Storage::delete($file[0]->file);
    
               return redirect()->back(); 
 }

 public function saveitems(){
    $input=Request::all();
if(isset($input['file'])){
     $name = $input['file']->getClientOriginalName();
        $ext= date('YmdHns');
        $file=$input['file'];
        $_filesname   = iconv("UTF-8", "windows-1251",$ext.$name);
        //$link = Input::file('img')->storeAs('../public/img', $_filesname);

        $link='/files/'.$ext.$name.'';

        $file->move('../public/files/',$_filesname);
}
else{
    $link=NULL;
}
    DB::table('items')->insert(
  ['menuid' => $input['menuid'],
  'nameItem'=> $input['nameitems'],
  'textItem'=> $input['textitems'],
  'file'=>$link
]
);
               return redirect()->back(); 
 }

  public function getitems($id){


     $url=DB::table('menu')->get();

     $item=DB::table('items')
        ->where('id_items',$id)
            ->get();
            $id=DB::table('items')
           ->where('id_items',$id)
           ->select('menuid')
           ->get();
           ;
           $id=json_decode($id);
           
                    $page=DB::table('menu')
                    ->where('id',$id[0]->menuid)
                    ->get();
                  //  dd($page);

    if((count($item))>0){
        
        return view('items',['arr'=>$url,'item'=>$item,'page'=>$page]);
    }
    else{
        return view('404');
    }
                
 }

  public function getfile($id){

    $file=DB::table('items')
        ->where('id_items',$id)
        ->select('file')
        ->get();
        $file=json_decode($file);

        $file= public_path().$file[0]->file;

         return Response::download($file);

  }
 public function editI(){

     $input=Request::all();
//dd($input);
     if(Auth::check()){
            if(isset($input['file'])){
                 $name = $input['file']->getClientOriginalName();
                    $ext= date('YmdHns');
                    $file=$input['file'];
                    $_filesname   = iconv("UTF-8", "windows-1251",$ext.$name);
                    //$link = Input::file('img')->storeAs('../public/img', $_filesname);

                    $link='/files/'.$ext.$name.'';

                    $file->move('../public/files/',$_filesname);

                     DB::table('items')
     ->where('id_items',$input['id'])
     ->update(
          ['nameItem'=> $input['nameitems'],
          'textItem'=> $input['textitems'],
          'file'=>$link]);
            }
            else{
                 DB::table('items')
     ->where('id_items',$input['id'])
     ->update(
          ['nameItem'=> $input['nameitems'],
          'textItem'=> $input['textitems']]);
            }

    
     $page=DB::table('items')
     ->where('id_items',$input['id'])
     ->select('menuid')
     ->get();
     $url=DB::table('menu')
     ->where('id',$page[0]->menuid)
     ->get();
     //dd();
return HomeController::getPage($url[0]->url); 
     }
     else{
    return view('404');
 }
        }
  public function delitem(){
    $input=Request::all();

$file=DB::table('items')
        ->where('id_items',$input['iditem'])
        ->select('file')
        ->get();
        $file=json_decode($file);
DB::table('items')
            ->where('id_items',$input['iditem'])
            ->delete();
//dd($file[0]->file);

Storage::delete($file[0]->file);
    
               return redirect()->back(); 
 }

 public function edititem($id){

    if(Auth::check()){

        $item=DB::table('items')
        ->where('id_items',$id)
        ->get();

    return view('edititems',['item'=>$item]);


}
else{
    return view('404');
 }
}



   
}
