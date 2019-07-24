<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Results</title>
</head>
<body>
    <h1>{{$results[0]->level->name}} Results</h1>
    <table class="topic/row">
        <thead>
            <tr>
                <th style="background-color:#DDD9CD;"><h4>Subject</h4></th>
                <th style="background-color:#DDD9CD;"><h4>Degree</h4></th>
                <th style="background-color:#DDD9CD;"><h4>full degree</h4></th>
                <th style="background-color:#DDD9CD;"><h4>Status</h4></th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr class="gradeX">
                <td style="text-align:center;"><h5>{{$result->subject->subject_code}}</h5></td>
                <td style="text-align:center;" ><h5>{{$result->degree}}</h5></td>
                <td style="text-align:center;width:200px;"><h5 >{{$result->full_degree}}</h5></td>
                <td style="text-align:center;width:200px;"><h5>{{$result->status}}</h5></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>