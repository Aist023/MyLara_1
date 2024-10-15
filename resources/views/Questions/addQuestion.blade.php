@extends('layouts/default')
@section('title') Add Question @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="" method="post">
            @csrf
            <div><label for="header">Header:</label> <input type="text" name="header" id="header" value="<?php echo (isset($_POST['header']))?$_POST['header']:''?>"></div>
            <div><label for="question">Question:</label>
                <textarea name="question" id='question' cols="40" rows="5"><?php echo (isset($_POST['question']))?$_POST['question']:'' ?></textarea>
            </div>
            <div><label for="date">Date Finish:</label> <input type="date" name="date" id="date" value="<?php echo (isset($_POST['date']))?$_POST['date']:''?>"></div>
            <div>
                <button type='submit' name='Question_button' value='Add_Options'>Add Options</button>
                <select name="Question_Options">
                    <option value="2" @if (isset($Options)&&$Options==2) selected @endif>2</option>
                    <option value="3" @if (isset($Options)&&$Options==3) selected @endif>3</option>
                    <option value="4" @if (isset($Options)&&$Options==4) selected @endif>4</option>
                    <option value="5" @if (isset($Options)&&$Options==5) selected @endif>5</option>
                </select>
            </div>
            @if (isset($Options))
                <hr>
                @for ($i = 0;$i<$Options;$i++)
                    <div><label for="Option_{{$i}}">Option {{$i+1}}</label> <input type="text" name="Options[]" id="Option_{{$i}}" value="<?php echo (isset($_POST['Options'])&& isset($_POST['Options'][$i]))?$_POST['Options'][$i]:''?>"></div>
                @endfor
                <hr>
            @endif
            @if (isset($test))
                <h1>{{$test}}</h1>
            @endif
            @if (isset($ErrorCode)&&$ErrorCode==1) <p style='color: red;'>Fill in all fields</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==2) <p style='color: red;'>Error</p> @endif
            <div>
                <div><button type='submit' name='Question_button' value='Add_Question'>Add Question</button></div>
                <div><button type='submit' name='Question_button' value='Exit'>Exit</button></div>
            </div>
        </form>
    </div>
</div>
<script>

</script>
@endsection