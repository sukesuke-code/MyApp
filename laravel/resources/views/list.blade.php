<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク一覧</title>
    <style>
    table {border-collapse:  collapse;}
    th,td {border: solid 1px;}
    th {background-color:lightgray;}
    </style>
</head>
<body>
    <div>
        <a href="{{route("top")}}">トップページ</a>
    </div>

    <div>
        <a href="{{route("task_add")}}">[新規作成]</a>
    </div>

    <table style="width:500px;">
        <tr>
            <th style="width:50px;">id</th>
            <th>タスク名</th>
            <th style="width:100px;">操作</th>
        </tr>
    @if($tasks->isEmpty())
        <tr>
            <td colspan="3">登録されていません。</td>
        </tr>
    @else
        @foreach($tasks as $task)
            <tr>
                <td style="text-align:center;">{{$task->id}}</td>
                <td style="text-align:left;">{{$task->name}}</td>
                <td style="text-align:center;">
                    <a href="{{route("task_edit", encrypt($task->id))}}">[編集]</a>
                    <a href="{{route("task_confirm", encrypt($task->id))}}">[削除]</a>
                </td>
            </tr>
        @endforeach
    @endif
    </table>
</body>
</html>
