<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Checker</title>
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
<h1>Language Checker</h1>
<textarea id="text" rows="10" cols="50"></textarea>
<button id="check">Check</button>
<div id="result"></div>
<a href="/history">View History</a>

<script>
    document.getElementById('check').addEventListener('click', function() {
        const text = document.getElementById('text').value;
        fetch('/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ text: text })
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = data.output;
            });
    });

    document.getElementById('text').addEventListener('input', function() {
        const text = document.getElementById('text').value;
        fetch('/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ text: text })
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = data.output;
            });
    });
</script>
</body>
</html>
