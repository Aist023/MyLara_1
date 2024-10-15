@extends('layouts/default')
@section('title') One Question @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="/PHP/MyLara_1/public/questions/oneQuestions" method="post" style="width: 500px;">
            <input type="text" name="QuestionID" value="<?php echo (isset($_POST['QuestionID'])&&$_POST['QuestionID'])?$_POST['QuestionID']:((isset($ID)&&$ID)?$ID:'') ?>" hidden>
            @csrf
            <div>
                <h1>{{$Question['header']}}</h1>
                <div><button type='submit' name='Question_button' value='Exit'>Exit</button></div>
            </div>
            <div style=" "><p>{{$Question['question']}}</p></div>
            <div><p>Date Finish: {{$Question['datefinish']}}</p></div>
            <hr>
            @if (isset($Options))
                @foreach ($Options as $item)
                    @if (isset($result)&&$result>=0)
                        <div class="Options_Blokc <?php echo ($result==$item['id'])?'Options_Blokc_select':''?>"><p>{{$item['option']}}  @if (isset($responsesSum)&&$responsesSum>0){{((100/$responsesSum)*$item['response_count'])}}@else{{0}}@endif%</p></div>
                    @else
                        <div><button type='submit' name='Option_button' value='{{$item['id']}}' style="width: 100%;">{{$item['option']}}</button></div>
                    @endif
                @endforeach
            @endif
        </form>
    </div>
</div>
<script>

</script>
@endsection