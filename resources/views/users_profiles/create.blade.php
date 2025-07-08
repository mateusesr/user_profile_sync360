<!DOCTYPE html>
<html>
<head>
    <title>Novo Perfil</title>
</head>
<body>

<h2>Criar Novo Perfil</h2>

<form action="{{ url('user_profiles/new') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nome:</label><br>
    <input name="nome" type="text" /><br>

    <label>Idade:</label><br>
    <input name="idade" type="number" /><br>

    <label>Rua:</label><br>
    <input name="rua" type="text" /><br>

    <label>Bairro:</label><br>
    <input name="bairro" type="text" /><br>

    <label>Cidade:</label><br>
    <input name="cidade" type="text" /><br>

    <label>Estado:</label><br>
    <input name="estado" type="text" /><br>

    <label>Biografia:</label><br>
    <textarea name="biografia"></textarea><br>

    <label>Imagem de Perfil:</label><br>
    <input type="file" name="imagem_perfil"><br><br>

    <input type="submit" value="Salvar Perfil" />
</form>

</body>
</html>
