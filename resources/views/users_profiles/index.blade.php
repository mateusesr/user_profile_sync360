<!DOCTYPE html>
<html>
<head>
    <title>Lista de Perfis</title>
</head>
<body>

<h3> Lista de Perfis </h3>

<ul>
    @foreach($perfis as $perfil)
        <li>
            <img src="{{ asset('storage/' . $perfil['imagem_perfil']) }}" alt="Imagem de Perfil" style="width: 100px; height: 100px;">
            <br>
            {{ $perfil['nome'] }} ({{ $perfil['idade'] }} anos) — {{ $perfil['rua'] }}, {{ $perfil['bairro'] }}, {{ $perfil['cidade'] }}/{{ $perfil['estado'] }}
            <br>
            <a href="{{ url('/user_profiles/edit', ['id' => $perfil['id']]) }}">Editar</a>
            <a href="{{ url('/user_profiles/delete', ['id' => $perfil['id']]) }}">Deletar</a>

        </li>
    @endforeach
</ul>

<br>
<a href="{{ url('/') }}">Voltar</a>
<a href="{{ url('/user_profiles/new') }}">Criar novo perfil</a>



</body>
</html>
