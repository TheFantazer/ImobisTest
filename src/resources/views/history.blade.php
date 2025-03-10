<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>
<h1>History</h1>
<table border="1">
    <thead>
    <tr>
        <th>Input</th>
        <th>Output</th>
        <th>Language</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($checks as $check)
        <tr>
            <td>{{ $check->input }}</td>
            <td>{!! $check->output !!}</td>
            <td>{{ $check->language }}</td>
            <td>{{ $check->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="/">Back to Checker</a>
</body>
</html>
