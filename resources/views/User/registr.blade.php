@extends('layouts/default')
@section('title') Registr @endsection
@section('content')
<div class='Block'>
    <div>
        <h2>Registr</h2>
        <form action="" method="post">
            @csrf
            <div><label for="email">Email:</label><input type="text" name="email" placeholder="Email" value="<?php echo (isset($_POST['email']))?$_POST['email']:'' ?>"></div>
            <div><label for="password">Password:</label><input type="password" name="password" placeholder="Password" value="<?php echo (isset($_POST['password']))?$_POST['password']:'' ?>"></div>
            <div><label for="repeatPassword">Repeat Password:</label><input type="password" name="repeatPassword" placeholder="Repeat Password" value="<?php echo (isset($_POST['repeatPassword']))?$_POST['repeatPassword']:'' ?>"></div>
            @if (isset($ErrorCode)&&$ErrorCode==1) <p style='color: red;'>Fill in all fields</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==2) <p style='color: red;'>Password != Repeat Password</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==3) <p style='color: red;'>There is already such a user</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==4) <p style='color: red;'>Error</p> @endif
            <div>
                <div><button type='submit' name='Registr_button' value='Save'>Save</button></div>
                <div><button type='submit' name='Registr_button' value='Exit'>Exit</button></div>
            </div>
        </form>
    </div>
</div>
@endsection