@extends('layouts/default')
@section('title') News @endsection
@section('content')
<div class='Block'>
    <div>
        <form action="" method="post">
            @csrf
            <div>
                <div><button type='submit' name='News_button' value='Add_News'>Add News</button></div>
                <div><button type='submit' name='News_button' value='Add_Type'>Add Type</button></div>
            </div>
            <div>
                <div>
                    <div>
                        <label for="Filter_heder">FT:</label>
                        <select name="Filter_type">
                            <option value="-">-</option>
                            @if (isset($Type))
                                @foreach ($Type as $item)
                                    <option value="{{$item['id']}}" @if (isset($_POST['Filter_type'])&&$item['id']==$_POST['Filter_type']) selected @endif>{{$item['typeName']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div><label for="Filter_heder">FH:</label><input type="text" name='Filter_heder' placeholder="Filter Heder" value="<?php echo (isset($_POST['Filter_heder']))?$_POST['Filter_heder']:'' ?>"></div>
                <div><button type='submit' name='News_button' value='Filer'>Filter</button></div>
            </div>
            <br><hr><br>
            <div>
                <div>
                    @if (isset($News))
                        @foreach ($News as $item)
                            <div class="BlockNews">
                                <h3>{{$item['header']}}</h3>
                                <p>{{$item['shortText']}}</p>
                                <p>Type: {{$item['typeName']}}</p>
                                <div><button type='submit' name='News_Open' value='{{$item['id']}}'>News Open</button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection