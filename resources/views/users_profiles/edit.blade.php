<!DOCTYPE html>
<html>
<head>
    <title>Editar Perfil</title>
</head>
<body>

<h2>Editar Perfil</h2>

<form action="{{ url('/user_profiles/edit') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $perfil['id'] }}">

    <label>Nome:</label><br>
    <input name="nome" type="text" value="{{ $perfil['nome'] }}" /><br>

    <label>Idade:</label><br>
    <input name="idade" type="number" value="{{ $perfil['idade'] }}" /><br>

    <label>Rua:</label><br>
    <input name="rua" type="text" value="{{ $perfil['rua'] }}" /><br>

    <label>Bairro:</label><br>
    <input name="bairro" type="text" value="{{ $perfil['bairro'] }}" /><br>

    <label>Cidade:</label><br>
    <input name="cidade" type="text" value="{{ $perfil['cidade'] }}" /><br>

    <label>Estado:</label><br>
    <input name="estado" type="text" value="{{ $perfil['estado'] }}" /><br>

    <label>Biografia:</label><br>
    <textarea name="biografia">{{ $perfil['biografia'] }}</textarea><br>

    <label>Imagem de Perfil:</label><br>
    <input type="file" name="imagem_perfil"><br>
    <small>(a imagem atual será mantida se nada for enviado)</small><br><br>

    <input type="submit" value="Salvar Alterações" />
</form>

<a href="{{ url('/user_profiles') }}">Voltar</a>

</body>
</html>
