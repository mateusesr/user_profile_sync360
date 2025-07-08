<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" />
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <div class="container mx-auto px-4 py-8 flex-1 flex flex-col items-center justify-center">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-md border border-gray-200 p-8 animate-fade-in">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <i class="fa-solid fa-user-pen text-green-600"></i> Editar Perfil
            </h1>
            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <ul class="list-disc ml-4">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-xl flex items-center gap-2 animate-fade-in">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <form id="profileEditForm" action="{{ url('/user_profiles/edit') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <input type="hidden" name="id" value="{{ $perfil['id'] }}">
                <div>
                    <label class="block text-gray-700 font-medium mb-1" for="nome"><i class="fa-solid fa-user"></i> Nome</label>
                    <input name="nome" id="nome" type="text" class="input-form" placeholder="Nome completo" required minlength="3" value="{{ $perfil['nome'] }}" />
                    <span class="error-msg" id="err-nome"></span>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1" for="idade"><i class="fa-solid fa-cake-candles"></i> Idade</label>
                        <input name="idade" id="idade" type="number" class="input-form" placeholder="Idade" required min="1" max="120" value="{{ $perfil['idade'] }}" />
                        <span class="error-msg" id="err-idade"></span>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1" for="estado"><i class="fa-solid fa-location-dot"></i> Estado</label>
                        <input name="estado" id="estado" type="text" class="input-form" placeholder="Estado" required minlength="2" maxlength="2" value="{{ $perfil['estado'] }}" />
                        <span class="error-msg" id="err-estado"></span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1" for="cidade"><i class="fa-solid fa-city"></i> Cidade</label>
                        <input name="cidade" id="cidade" type="text" class="input-form" placeholder="Cidade" required value="{{ $perfil['cidade'] }}" />
                        <span class="error-msg" id="err-cidade"></span>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1" for="bairro"><i class="fa-solid fa-house"></i> Bairro</label>
                        <input name="bairro" id="bairro" type="text" class="input-form" placeholder="Bairro" required value="{{ $perfil['bairro'] }}" />
                        <span class="error-msg" id="err-bairro"></span>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1" for="rua"><i class="fa-solid fa-road"></i> Rua</label>
                    <input name="rua" id="rua" type="text" class="input-form" placeholder="Rua" required value="{{ $perfil['rua'] }}" />
                    <span class="error-msg" id="err-rua"></span>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1" for="biografia"><i class="fa-solid fa-align-left"></i> Biografia</label>
                    <textarea name="biografia" id="biografia" class="input-form" placeholder="Conte um pouco sobre você..." rows="3" required minlength="10">{{ $perfil['biografia'] }}</textarea>
                    <span class="error-msg" id="err-biografia"></span>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1" for="imagem_perfil"><i class="fa-solid fa-image"></i> Imagem de Perfil (opcional)</label>
                    <input type="file" name="imagem_perfil" id="imagem_perfil" accept="image/*" class="input-form-file" />
                    <small class="text-gray-400">(a imagem atual será mantida se nada for enviado)</small>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit" id="btnSalvar" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-green-600 text-white rounded-xl shadow-md hover:bg-green-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-300 relative">
                        <span id="btnSpinner" class="hidden animate-spin mr-2"><i class="fa-solid fa-spinner"></i></span>
                        <i class="fa-solid fa-floppy-disk"></i> Salvar
                    </button>
                    <a href="{{ url('/user_profiles') }}" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-xl shadow hover:bg-gray-300 transition-all duration-200">
                        <i class="fa-solid fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
    // Tailwind classes para inputs
    document.querySelectorAll('.input-form').forEach(el => {
        el.classList.add('w-full','rounded-lg','border','border-gray-300','px-3','py-2','focus:outline-none','focus:ring-2','focus:ring-green-200','transition-all','duration-150','text-gray-800','bg-gray-50','placeholder-gray-400');
    });
    document.querySelectorAll('.input-form-file').forEach(el => {
        el.classList.add('block','w-full','text-sm','text-gray-500','file:mr-4','file:py-2','file:px-4','file:rounded-lg','file:border-0','file:text-sm','file:font-semibold','file:bg-green-50','file:text-green-700','hover:file:bg-green-100');
    });
    // Validação JS
    const form = document.getElementById('profileEditForm');
    const btn = document.getElementById('btnSalvar');
    const spinner = document.getElementById('btnSpinner');
    form.addEventListener('submit', function(e) {
        let valid = true;
        // Limpa erros
        document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
        // Nome
        if(form.nome.value.trim().length < 3) {
            document.getElementById('err-nome').textContent = 'Nome deve ter pelo menos 3 caracteres.';
            valid = false;
        }
        // Idade
        if(form.idade.value < 1 || form.idade.value > 120) {
            document.getElementById('err-idade').textContent = 'Idade deve ser entre 1 e 120.';
            valid = false;
        }
        // Estado
        if(form.estado.value.trim().length !== 2) {
            document.getElementById('err-estado').textContent = 'Estado deve ter 2 letras.';
            valid = false;
        }
        // Cidade
        if(form.cidade.value.trim().length < 2) {
            document.getElementById('err-cidade').textContent = 'Cidade obrigatória.';
            valid = false;
        }
        // Bairro
        if(form.bairro.value.trim().length < 2) {
            document.getElementById('err-bairro').textContent = 'Bairro obrigatório.';
            valid = false;
        }
        // Rua
        if(form.rua.value.trim().length < 2) {
            document.getElementById('err-rua').textContent = 'Rua obrigatória.';
            valid = false;
        }
        // Biografia
        if(form.biografia.value.trim().length < 10) {
            document.getElementById('err-biografia').textContent = 'Biografia deve ter pelo menos 10 caracteres.';
            valid = false;
        }
        if(!valid) {
            e.preventDefault();
            return false;
        }
        // Mostra spinner
        spinner.classList.remove('hidden');
        btn.setAttribute('disabled', 'disabled');
    });
    </script>
    <style>
        .error-msg { color: #dc2626; font-size: 0.875rem; display: block; margin-top: 0.25rem; }
        .animate-fade-in { transition: opacity 0.5s; opacity: 1; }
        .opacity-0 { opacity: 0 !important; }
    </style>
</body>
</html>
