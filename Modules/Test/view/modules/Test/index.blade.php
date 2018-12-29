<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1" width="800" align="center">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>类型</th>
        <th>添加时间</th>
    </tr>
    @foreach($user as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->age}}</td>
        <td>{{$v->type}}</td>
        <td>{{$v->created_at}}</td>
    </tr>
        @endforeach
</table>
</body>
</html>