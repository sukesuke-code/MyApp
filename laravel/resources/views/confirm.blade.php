<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>delete confirm Task</title>
    <style>
    table {border-collapse:  collapse;}
    th,td {border: solid 1px;}
    th {background-color:lightgray;}
    </style>
</head>
<body>
    <div>
        <a href="{{route('task_list')}}">[戻る]</a>
    </div>
    <form action="{{route("task_delete")}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{encrypt($task->id)}}" />
        <table style="width:500px;">
            <tr>
                <th style="width:100px;">タスク名</th>
                <td>
                    {{$task->name}}
                </td>
            </tr>
        </table>
        <p><input type="submit" value="削除" /></p>
    </form>
</body>
</html>
