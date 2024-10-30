<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação Topico</title>
    <style>
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
        }
        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        #submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Criar Topico</h1>
    <form id="registration-form" action="{{ route('CreateTopic') }}" method="post">
                @csrf
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" />
                @error('title') <span>{{ $message }}</span> <br /> @enderror

                <label for="description" class="form-label">Descrição</label>
                <input type="text" name="description" id="description" class="form-control" />
                @error('description') <span>{{ $message }}</span> <br /> @enderror

                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" id="status" class="form-control" />
                @error('status') <span>{{ $message }}</span> <br /> @enderror

                <label for="image" class="form-label">Imagem</label>
                <input type="text" name="image" id="image" class="form-control" />
                @error('image') <span>{{ $message }}</span> <br /> @enderror

                <label for="category" class="form-label">Categoria</label>
                <select name="category" id="category" class="form-control">
                @if(isset($categories))
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
                @endif
                </select>

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</div>

</body>
</html>