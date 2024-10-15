@extends('layouts/default')
@section('title') Add News @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div><label for="header">Header:</label><input type="text" name="header" id="header" placeholder="Header" value="<?php echo (isset($_POST['header']))?$_POST['header']:'' ?>"></div>
            <div><label for="shortText">Short Text:</label><input type="text" name="shortText" id="shortText" placeholder="Short Text" value="<?php echo (isset($_POST['shortText']))?$_POST['shortText']:'' ?>"></div>
            <div><label for="articl">Articl:</label>
                <textarea name="articl" id="articl" cols="40" rows="5"><?php echo (isset($_POST['articl']))?$_POST['articl']:'' ?></textarea>
            </div>
            <div>
                <label for="type">Type:</label>
                <select name="type" id="type">
                    @if (isset($Type))
                        @foreach ($Type as $item)
                            <option value="{{$item['id']}}" @if (isset($_POST['type'])&&$item['id']==$_POST['type']) selected @endif>{{$item['typeName']}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div><input type="file" name="image" accept="image/*" style="width: 100%"></div>
            @if (isset($ErrorCode)&&$ErrorCode==1) <p style='color: red;'>Fill in all fields</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==2) <p style='color: red;'>There is already such a header</p> @endif
            @if (isset($ErrorCode)&&$ErrorCode==3) <p style='color: red;'>Error</p> @endif
            <div>
                <div><button type='submit' name='News_button' value='Add_News'>Add News</button></div>
                <div><button type='submit' name='News_button' value='Exit'>Exit</button></div>
            </div>
        </form>
    </div>
</div>
@endsection