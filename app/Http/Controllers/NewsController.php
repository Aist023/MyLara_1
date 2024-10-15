<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Types;
use App\Models\News;
use App\Models\Comments;
use App\Models\newsUsers;

class NewsController extends Controller
{
    public function indexGet(){
        $Type=Types::all();
        $New=News::select('news.id', 'news.header', 'news.shortText', 'types.typeName', 'news.typeID')->join('types', 'types.id', '=', 'news.typeID')->get();
        return view('News/index',['Type'=>$Type,'News'=>$New]);
    }
    public function indexPost(Request $request){
        $data = $request->all();
        $Type=Types::all();
        $New=News::select('news.id', 'news.header', 'news.shortText', 'types.typeName', 'news.typeID')->join('types', 'types.id', '=', 'news.typeID')->get();
        if(isset($data['News_button'])){
            switch ($data['News_button']) {
                case 'Add_News':{if($Type){return redirect('news/addNews');}}break;
                case 'Add_Type':{return redirect('news/addType');}break;
                case 'Filer':{
                    if($data['Filter_type']!='-'){
                        $New=$New->where('typeID',$data['Filter_type']);
                    }
                    if($data['Filter_heder']!=''){
                        $New=$New->where('header', $data['Filter_heder']);
                    }
                }break;
            }
        }elseif(isset($data['News_Open'])&&$data['News_Open']){
            return redirect('news/oneNews/'.$data['News_Open']);
        }
        return view('News/index',['Type'=>$Type,'News'=>$New]);
    }

    public function addTypeGet(){
        return view('News/addType');
    }
    public function addTypePost(Request $request){
        $data = $request->all();
        if(isset($data['Type_button']) && $data['Type_button']==='Exit'){return redirect('news');}
        elseif(isset($data['Type_button']) && $data['Type_button']==='Add_Type'){
            if((!$data['type'])){return view('News/addType',['ErrorCode'=>1]);}
            $Type=Types::where('typeName',$data['type'])->first();
            if($Type){return view('News/addType',['ErrorCode'=>2]);}
            Types::create(['typeName'=>$data['type'],]);
            return redirect('news');
        }
        return view('News/addType',['ErrorCode'=>3]);
    }

    public function addNewsGet(){
        $Type=Types::all();
        return view('News/addNews',['Type'=>$Type]);
    }
    public function addNewsPost(Request $request){
        $data = $request->all();
        $img = $request->file('image');
        $Type=Types::all();
        if(isset($data['News_button']) && $data['News_button']==='Exit'){return redirect('news');}
        elseif(isset($data['News_button']) && $data['News_button']==='Add_News'){
            if((!$data['header'])||(!$data['shortText'])||(!$data['articl'])||(!$data['type'])||(!$img)){return view('News/addNews',['Type'=>$Type,'ErrorCode'=>1]);}
            $base64Image = base64_encode(file_get_contents($img->getRealPath()));
            News::create([
                'header'=>$data['header'],
                'shortText'=>$data['shortText'],
                'articl'=>$data['articl'],
                'typeID'=>$data['type'],
                'img'=>$base64Image,
            ]);
            return redirect('news');
        }
        return view('News/addNews',['Type'=>$Type,'ErrorCode'=>3]);
    }

    public function oneNewsGet($id){
        $News=News::select('news.id', 'news.header', 'news.shortText', 'news.articl', 'news.img', 'types.typeName', 'news.typeID')->join('types', 'types.id', '=', 'news.typeID')->find($id);
        $Comments=Comments::select('comments.id','comments.date','newsUsers.email','comments.comment')->join('newsUsers','newsUsers.id','=','comments.newsUserID')->where('comments.newsID',$id)->get();
        return view('News/oneNews',['ID'=>$id,'News'=>$News,'Comments'=>$Comments]);
    }
    public function oneNewsPost(Request $request){
        $data = $request->all();
        if((!isset($data['NewsID']))||(!$data['NewsID'])){return redirect('news');}

        $News=News::select('news.id', 'news.header', 'news.shortText', 'news.articl', 'news.img', 'types.typeName', 'news.typeID')->join('types', 'types.id', '=', 'news.typeID')->find($data['NewsID']);
        if(isset($data['Comment_button'])&&$data['Comment_button']=='Save'&&isset($data['comment'])&&$data['comment']!=''&&isset($_COOKIE['User'])&&$_COOKIE['User']!=''){
            $User=newsUsers::select('newsUsers.id')->where('newsUsers.email',$_COOKIE['User'])->first();
            Comments::create([
                'newsUserID'=>$User['id'],
                'newsID'=>$News['id'],
                'comment'=>$data['comment'],
                'date' => now(),
            ]);
        }
        $Comments=Comments::select('comments.id','comments.date','newsUsers.email','comments.comment')->join('newsUsers','newsUsers.id','=','comments.newsUserID')->where('comments.newsID',$id)->get();
        return view('News/oneNews',['ID'=>$News['id'],'News'=>$News,'Comments'=>$Comments]);
    }
}
