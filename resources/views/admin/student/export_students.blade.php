<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>email</th>
        <th>parent_phone</th>
        <th>address</th>
        <th>class</th>
        <th>level</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->student->parent_phone}}</td>
        <td>{{$student->address}}</td>
        <td>{{$student->student->classroom->name}}</td>
        <td>{{$student->student->level->name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>