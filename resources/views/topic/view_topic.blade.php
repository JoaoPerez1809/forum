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
                        @if($topic->post->user_id == Auth::id())
                        <a href="{{ route('EditTopic', $topic->id) }}" class="btn btn-secondary">
                            Editar
                        </a>
                        <form action="{{ route('DeleteTopic', $topic->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este tópico?');">
                                Deletar
                            </button>
                        </form>
                    @endif
                </li>
            @endforeach
            @endif
            </ul>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>