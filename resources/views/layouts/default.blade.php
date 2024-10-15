<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="{{asset("css/app.css")}}">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            color: white;
        }
        body{
            background-color: rgb(24, 24, 24);
        }
        label, input, button, table, select, option{
            font-size: 16px;
        }
        h1{
            text-align: center;
        }

        .Block{
            display: flex;
            justify-content: center;
        }
        .Block>div{
            margin: 50px;
            padding: 10px 20px;
            border: 2px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 5px 1px rgb(72, 90, 255);
            border-radius: 5px;
        }
        .Block>div>form>div{
            margin: 5px 0px;
            display: flex;
            justify-content: space-between;
        }
        .Block>div>form>div>input{
            width: 150px;
            background-color: rgba(255, 255, 255, 0);
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form>div>div>input{
            margin-top: 3px;
            width: 170px;
            background-color: rgba(255, 255, 255, 0);
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form>div>textarea{
            margin-top: 3px;
            resize: none;
            background-color: rgba(255, 255, 255, 0);
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form>div>select{
            width: 150px;
            background-color: rgba(255, 255, 255, 0);
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form>div>select>option{
            background-color: rgb(24, 24, 24);
        }

        .Block>div>form>div>div>div>select{
            width: 200px;
            margin: 3px 3px;
            background-color: rgba(255, 255, 255, 0);
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form>div>div>div>select>option{
            background-color: rgb(24, 24, 24);
        }

        .Block>div>form button{
            width: 200px;
            margin: 3px 3px;
            background-color: rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            border: none;
            color: white;
        }
        .Block>div>form button:hover{
            background-color: rgb(72, 90, 255);
        }
        .Block>div>h2{
            text-align: center;
        }

        .Block>div>form .BlockNews{
            width: 700px;
            margin: 5px;
            padding: 10px 20px;
            border: 2px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 5px 1px rgb(72, 90, 255);
            border-radius: 5px;
        }

        .Block>div>form>.ProductBlock{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 800px;
            gap: 10px;
        }
        .Block>div>form>.ProductBlock>div{
            padding: 5px;
            margin: 5px;
            width: 250px;
            border: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            align-self: flex-start;
            min-height: 10px
        }
        .Block>div>form>.ProductBlock{
            text-align: center;
        }

        .Table{
            width: 900px;
            display: flex;
            text-align: center;
        }
        .Table>div>table{
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
            width: 890px;
            margin: 5px;
            border-collapse: collapse;
            border: 1px solid rgb(0, 26, 255);
        }
        .Table>div>table td{
            padding: 5px;
            text-align: center;
            border: 1px solid rgb(0, 26, 255);
        }
        .Table>div>table th{
            padding: 5px;
            background-color: rgb(0, 26, 255);
            border: 1px solid rgb(0, 26, 255);
        }

        header{
            position: absolute;
            display: flex;
            justify-content: space-between;
            padding: 5px;
            height: 35px;
            width: 100%;
            border-bottom: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
        }
        header>div{
            margin: 0px 5px;
        }
        header a{
            text-decoration: none;
        }

        .BigNews{
            width: 700px;
            padding: 15px;
            border-bottom: 1px solid rgb(0, 26, 255);
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
        }
        .BigNews>img{
            width: 100%;
            text-align: center;
        }

        .BigP{
            text-align: center;
            font-size: 26px;
            font-weight: 500;
            margin: 5px;
        }

        .Options_Blokc{
            text-align: center;
            margin: 3px 3px;
            padding: 3px;
            width: 100%;
            border: 1px solid rgb(0, 26, 255);
            border-radius: 10px;
            box-shadow: 0px 0px 2px 1px rgb(72, 90, 255);
        }
        .Options_Blokc_select{
            box-shadow: 0px 0px 2px 3px rgb(53, 141, 50);
        }
    </style>
</head>
<body>
    @include('layouts.head')
    @yield('content')
</body>
</html>