<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\newsUsers;
use App\Models\Questions;
use App\Models\Options;
use App\Models\Responses;

class QuestionController extends Controller
{
    public function indexGet(){
        $quest=Questions::all();
        return view('Questions/index',['Questions'=>$quest]);
    }
    public function indexPost(Request $request){
        $data = $request->all();
        $quest=Questions::all();
        if(isset($data['Question_button'])){
            switch ($data['Question_button']) {
                case 'Add_Question':{return redirect('questions/addQuestions');}break;
                case 'Filer':{
                    if(isset($data['Filter_heder'])){
                        $quest=$quest->where('header', $data['Filter_heder']);
                    }
                }break;
            }
        }elseif(isset($data['Question_Open'])){
            return redirect('questions/oneQuestions/'.$data['Question_Open']);
        }
        return view('Questions/index',['Questions'=>$quest]);
    }

    public function addQuestionsGet(){
        return view('Questions/addQuestion',['Options'=>2]);
    }
    public function addQuestionsPost(Request $request){
        $data=$request->all();
        $ErrorCode=0;$Options=2;
        if(isset($data['Question_button'])){
            switch ($data['Question_button']) {
                case 'Exit':{return redirect('questions');}break;
                case 'Add_Options':{if(isset($data['Question_Options'])){$Options=$data['Question_Options'];}}break;
                case 'Add_Question':{
                    if(isset($data['Options'])){
                        if((count(array_filter($data['Options'], function($item) {return $item !== null;}))==count($data['Options']))&&(isset($data['header']))&&(isset($data['question']))&&(isset($data['date'])&&strtotime($data['date']) > time())){
                            $question = Questions::create([
                                'header' => $data['header'],
                                'question' => $data['question'],
                                'datefinish' => $data['date'],
                            ]);
                            foreach($data['Options'] as $item){
                                Options::create([
                                    'questionID'=> $question->id,
                                    'option'=> $item,
                                ]);
                            }
                            return redirect('questions');
                        }else{
                            $ErrorCode=1;
                        }
                        $Options=count($data['Options']);
                    }else{
                        $ErrorCode=2;
                    }
                }break;
            }
        }
        return view('Questions/addQuestion',['Options'=>$Options,'ErrorCode'=>$ErrorCode]);
    }

    public function oneQuestionsGet($id){

        if(!isset($_COOKIE['User'])){return redirect('questions');}
        $User=newsUsers::select('newsUsers.id')->where('newsUsers.email',$_COOKIE['User'])->first();
        if(!$User){return redirect('questions');}

        $quest=Questions::find($id);
        if(!$quest){return redirect('questions');}

        $options = Options::select('options.id', 'options.option', DB::raw('COUNT(responses.optionID) as response_count'))
        ->leftJoin('responses', 'options.id', '=', 'responses.optionID')
        ->where('options.questionID', $id)
        ->groupBy('options.id', 'options.option')
        ->get();

        $result=-1;
        $response=Responses::select('options.id')->where('newsUserID', $User['id'])->leftJoin('options', 'options.id', '=', 'responses.optionID')->where('options.questionID', $id)->first();
        if($response){$result=$response['id'];}
        elseif(strtotime($quest['datefinish']) < time()){$result=0;}

        return view('Questions/oneQuestions',['ID'=>$id,'Question'=>$quest,'Options'=>$options,'responsesSum'=>$options->sum('response_count'),'result'=>$result]);
    }

    public function oneQuestionsPost(Request $request){
        $data=$request->all();

        if(!isset($_COOKIE['User'])){return redirect('questions');}
        $User=newsUsers::select('newsUsers.id')->where('newsUsers.email',$_COOKIE['User'])->first();
        if(!$User){return redirect('questions');}

        if(!isset($data['QuestionID'])){return redirect('questions');}
        $quest=Questions::find($data['QuestionID']);
        if(!$quest){return redirect('questions');}

        $options = Options::select('options.id', 'options.option', DB::raw('COUNT(responses.optionID) as response_count'))
        ->leftJoin('responses', 'options.id', '=', 'responses.optionID')
        ->where('options.questionID', $data['QuestionID'])
        ->groupBy('options.id', 'options.option')
        ->get();

        if(isset($data['Question_button'])&&$data['Question_button']=='Exit'){
            return redirect('questions');
        }elseif(isset($data['Option_button'])){
            $Optiontest=Options::find($data['Option_button']);
            if($Optiontest && strtotime($quest['datefinish']) > time()){
                Responses::create([
                    'optionID'=>$data['Option_button'],
                    'newsUserID'=>$User['id'],
                ]);
                return redirect('questions/oneQuestions/'.$data['QuestionID']);
            }
        }

        $result=-1;
        $response=Responses::select('options.id')->where('newsUserID', $User['id'])->leftJoin('options', 'options.id', '=', 'responses.optionID')->where('options.questionID', $data['QuestionID'])->first();
        if($response){$result=$response['id'];}
        elseif(strtotime($quest['datefinish']) < time()){$result=0;}

        return view('Questions/oneQuestions',['ID'=>$data['QuestionID'],'Question'=>$quest,'Options'=>$options,'responsesSum'=>$options->sum('response_count'),'result'=>$result]);
    }
}