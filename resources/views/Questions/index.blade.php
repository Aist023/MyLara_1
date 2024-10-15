@extends('layouts/default')
@section('title') Questions @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="" method="post">
            @csrf
            <div>
                <div><button type='submit' name='Question_button' value='Add_Question'>Add Question</button></div>
            </div>
            <div>
                <div><label for="Filter_heder">FH:</label><input type="text" name='Filter_heder' placeholder="Filter Heder" value="<?php echo (isset($_POST['Filter_heder']))?$_POST['Filter_heder']:'' ?>"></div>
                <div><button type='submit' name='Question_button' value='Filer'>Filter</button></div>
            </div>
            <br><hr><br>
            <div>
                <div>
                    @if (isset($Questions))
                        @foreach ($Questions as $item)
                            <div class="BlockNews">
                                <h3>{{$item['header']}}</h3>
                                <p>{{$item['question']}}</p>
                                <p>Date Finish: {{$item['datefinish']}}</p>
                                <div><button type='submit' name='Question_Open' value='{{$item['id']}}'>Question Open</button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection