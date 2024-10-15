@extends('layouts/default')
@section('title') Add Type @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="" method="post">
            @csrf
            <div><label for="type">Type:</label><input type="text" name="type" placeholder="Type" value="<?php echo (isset($_POST['type']))?$_POST['type']:'' ?>"></div>
            @if (isset($ErrorCode)&&$ErrorCode==1) <p style='color: red;'>Fill in all fields</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==2) <p style='color: red;'>There is already such a type</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==3) <p style='color: red;'>Error</p> @endif
            <div>
                <div><button type='submit' name='Type_button' value='Add_Type'>Add Type</button></div>
                <div><button type='submit' name='Type_button' value='Exit'>Exit</button></div>
            </div>
        </form>
    </div>
</div>
@endsection