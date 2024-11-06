<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topicos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex justify-content-center">
        <div class="col-6 p-5">
            <h1>Topicos</h1>
            <a href="{{ route('CreateTopic') }}" class="btn btn-secondary">
                        Adicionar
                    </a>
            <br />
            <ul>
            @if(isset($topics))
            @foreach ($topics as $topic)
                <li>
                    <a href="{{ route('showTopic', $topic->id) }}">
                        {{ $topic->title }}
                        </a>
                </li>
            @endforeach
            @endif
            </ul>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>