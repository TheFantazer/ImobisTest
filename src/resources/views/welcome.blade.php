<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Checker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .highlight {
            background-color: #ffcc00;
            font-weight: bold;
        }
        .result-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h1 class="card-title text-center">Language Checker</h1>
                </div>
                <div class="card-body">
                    <form id="checkForm">
                        <div class="mb-3">
                            <label for="text" class="form-label">Введите текст:</label>
                            <textarea id="text" class="form-control" rows="5" placeholder="Например: Для aктивации аккaунта неoбxодимо ввeсти код подтвеpждения"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" id="check" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle"></i> Проверить
                            </button>
                        </div>
                    </form>
                    <div id="result" class="result-box mt-4"></div>
                </div>
                <div class="card-footer text-center">
                    <a href="/history" class="btn btn-outline-secondary">
                        <i class="bi bi-clock-history"></i> История проверок
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('check').addEventListener('click', function() {
        const text = document.getElementById('text').value;
        fetch('/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ text: text, save:true })
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = data.output;
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('text').addEventListener('input', function() {
        const text = document.getElementById('text').value;
        fetch('/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ text: text, save:false })
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = data.output;
            })
            .catch(error => console.error('Error:', error));
    });
</script>
</body>
</html>
