@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfis de Usuário</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .swal2-popup { font-size: 1.1rem !important; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-8 flex-1">
        @if(session('success'))
            <div id="msgSuccess" class="fixed top-4 left-1/2 -translate-x-1/2 z-50 flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg animate-fade-in">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
            <script>setTimeout(()=>{document.getElementById('msgSuccess').style.display='none'},3500);</script>
        @endif
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Perfis de Usuário</h1>
            <form method="GET" action="" class="flex items-center gap-2 w-full md:w-auto">
                <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome..." class="rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-150 text-gray-800 bg-gray-50 placeholder-gray-400 w-full md:w-64">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition hover:scale-105"><i class="fa-solid fa-magnifying-glass"></i></button>
                @if(request('busca'))
                    <a href="{{ url('/user_profiles') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition hover:scale-105 ml-2 flex items-center gap-1">
                        <i class="fa-solid fa-arrow-rotate-left"></i> Limpar busca
                    </a>
                @endif
            </form>
            <a href="{{ url('/user_profiles/new') }}" class="inline-flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-xl shadow-lg hover:bg-blue-700 hover:scale-105 transition-all duration-200 text-lg font-semibold">
                <i class="fa-solid fa-user-plus"></i> Novo Perfil
            </a>
        </div>
        @if(count($perfis) === 0)
            <div class="flex flex-col items-center justify-center py-16 text-gray-400">
                <i class="fa-regular fa-face-frown text-5xl mb-4"></i>
                <p class="text-lg">Nenhum perfil cadastrado ainda.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($perfis as $perfil)
                    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-7 flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-200 group">
                        <div class="w-28 h-28 mb-4 rounded-full overflow-hidden ring-4 ring-blue-100 bg-gray-100 flex items-center justify-center">
                            @if($perfil['imagem_perfil'])
                                <img src="{{ asset('storage/' . $perfil['imagem_perfil']) }}" alt="Imagem de Perfil" class="object-cover w-full h-full">
                            @else
                                <img src="https://randomuser.me/api/portraits/lego/1.jpg" alt="Avatar padrão" class="object-cover w-full h-full">
                            @endif
                        </div>
                        <div class="text-center">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $perfil['nome'] }}</h2>
                            <p class="text-gray-500 text-sm mb-1">
                                {{ $perfil['idade'] }} {{ $perfil['idade'] == 1 ? 'ano' : 'anos' }}
                            </p>
                            <p class="text-gray-500 text-sm mb-1">{{ $perfil['cidade'] }}/{{ $perfil['estado'] }}</p>
                            <p class="text-gray-400 text-xs mb-2 line-clamp-2">{{ Str::limit($perfil['biografia'], 60) }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="{{ url('/user_profiles/edit', ['id' => $perfil['id']]) }}" class="inline-flex items-center gap-1 px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 hover:scale-105 transition focus:outline-none focus:ring-2 focus:ring-green-300">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>
                            <form action="{{ url('/user_profiles/delete', ['id' => $perfil['id']]) }}" method="POST" class="form-excluir" data-id="{{ $perfil['id'] }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 hover:scale-105 transition focus:outline-none focus:ring-2 focus:ring-red-300">
                                    <i class="fa-solid fa-trash"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // SweetAlert2 para confirmação de exclusão
    document.querySelectorAll('.form-excluir').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não poderá desfazer essa ação!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    // Animação fade-in para mensagem de sucesso
    document.querySelectorAll('.animate-fade-in').forEach(el => {
        el.classList.add('opacity-0');
        setTimeout(() => el.classList.remove('opacity-0'), 100);
    });
    </script>
</body>
</html>
