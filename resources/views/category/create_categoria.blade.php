<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação Categoria</title>
</head>
<body>


<div class="form-container">
    <h1>Cadastrar Categoria</h1>
    <form id="registration-form" action="{{ route('registercategoria') }}" method="post">
        @csrf
        <label for="category">Categoria</label>
        <input type="text" id="category" name="category" placeholder="Categoria" value="{{ old('category')}}" required>
        @error('category') <span class="error">{{ $message }}</span> @enderror

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</body>
</html>