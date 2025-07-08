# User Profile Sync 360

## Desafio Técnico – Sync360

Este repositório contém a solução para o **Desafio Técnico – Perfil de Usuário** solicitado pela equipe da Sync360.io.

### Objetivo
Desenvolver uma página web para exibição, edição e salvamento de perfil de usuário, com dados armazenados em banco de dados MySQL.

### Requisitos Atendidos
- Exibição das informações do usuário:
  - Imagem de perfil
  - Nome completo
  - Idade
  - Rua, bairro, estado
  - Biografia
- Formulário para edição dos dados acima, com envio das alterações
- Salvamento das informações em banco de dados MySQL
- Interface responsiva e agradável (desktop e mobile)
- API em PHP (Laravel) com rotas para buscar e atualizar dados do usuário
- Possibilidade de listar, editar e deletar múltiplos perfis (extra)

### Tecnologias Utilizadas
- **Backend:** PHP 8.2+, Laravel 12.x, MySQL
- **Frontend:** Blade (Laravel), TailwindCSS, JavaScript

---

## Como rodar o projeto localmente

### Pré-requisitos
- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM >= 9
- MySQL

### Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/mateusesr/user_profile_sync360.git
   cd user-profile-sync-360
   ```

2. **Instale as dependências do backend:**
   ```bash
   composer install
   ```

3. **Instale as dependências do frontend:**
   ```bash
   npm install
   ```

4. **Configure o arquivo `.env`:**
   - Copie o exemplo e ajuste para seu ambiente MySQL:
     ```env
     APP_KEY= # gere com o comando abaixo
     APP_URL=http://localhost:8000
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nome_do_banco
     DB_USERNAME=usuario
     DB_PASSWORD=senha
     FILESYSTEM_DISK=public
     ```
   - Gere a chave da aplicação:
     ```bash
     php artisan key:generate
     ```
   - Crie o banco de dados MySQL informado acima antes de rodar as migrações.

5. **Execute as migrações.**
   ```bash
   php artisan migrate
   ```

6. **(Opcional) Popule o banco com dados de exemplo:**
   ```bash
   php artisan db:seed
   ```

7. **Execute o projeto:**
   ```bash
   composer run dev
   ```
   Isso irá iniciar o servidor Laravel e o frontend (Vite).

8. **Acesse no navegador:**
   [http://localhost:8000/user_profiles](http://localhost:8000/user_profiles)

---

## Estrutura de Pastas
- `app/Http/Controllers/` — Controladores da aplicação
- `app/Models/` — Modelos Eloquent
- `resources/views/` — Views Blade (HTML)
- `routes/web.php` — Rotas web
- `database/migrations/` — Migrações do banco
- `public/` — Arquivos públicos

## Fluxo de Uso
1. Acesse `/user_profiles` para ver a lista de perfis cadastrados.
2. Clique em "Criar novo perfil" para cadastrar um novo usuário.
3. Edite ou exclua perfis existentes usando os botões na listagem.


## Observações
- O backend utiliza MySQL por padrão, mas pode ser adaptado para SQLite.
- O frontend é responsivo e utiliza TailwindCSS.
- O projeto segue boas práticas de organização e componentização.

## Contato
Desenvolvido por Mateus Rosa (<mateusesr1@gmail.com>) para o processo seletivo da Sync360.io.

Dúvidas ou sugestões? Abra uma issue ou entre em contato!