Markdown# 🎸 Guitardex — Mural de Equipamentos

O **Guitardex** é uma aplicação web desenvolvida em Laravel para músicos e entusiastas de instrumentos registrarem, organizarem e exibirem sua coleção de guitarras e equipamentos no mural da comunidade.

---

## 🚀 Funcionalidades

- **CRUD Completo de Equipamentos:** Cadastro, listagem, edição e exclusão de instrumentos.
- **Autenticação de Usuários:** Registro e login para gerenciamento de garagem própria.
- **Autorização de Acesso:** Apenas o proprietário de um equipamento pode editar ou excluir suas especificações.
- **Upload de Imagens:** Suporte para envio de fotos do equipamento armazenadas via Laravel Storage.
- **Interface Responsiva:** Design escuro (*Dark Mode*) construído com Tailwind CSS.

---

## 🛠️ Tecnologias Utilizadas

- **Back-end:** [PHP 8.2+](https://www.php.net/), [Laravel 11](https://laravel.com/)
- **Front-end:** Blade Templating, [Tailwind CSS](https://tailwindcss.com/)
- **Banco de Dados:** MySQL / SQLite
- **Arquitetura:** MVC (Model-View-Controller) & RESTful Routes

---

## ⚙️ Como Executar o Projeto Localmente

### Pré-requisitos
- PHP 8.2 ou superior instalado
- Composer
- Node.js & NPM

### Passo a Passo

1. **Clonar o repositório:**
   ```bash
   git clone [https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git](https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git)
   cd SEU-REPOSITORIO
Instalar as dependências do PHP:Bashcomposer install
Configurar o Arquivo de Ambiente:Bashcp .env.example .env
php artisan key:generate
Configurar o Banco de Dados:Abra o arquivo .env e ajuste as credenciais do seu banco de dados.Executar as Migrations:Bashphp artisan migrate
Criar o Symlink do Storage (Obrigatório para exibição das fotos):Bashphp artisan storage:link
Instalar e compilar os assets do Front-end:Bashnpm install
npm run dev
Iniciar o Servidor de Desenvolvimento:Bashphp artisan serve
Acesse a aplicação em http://127.0.0.1:8000.📌 Rotas Principais (RESTful)VerboRotaAção no ControllerDescriçãoGET/muralMuralController@indexLista todos os equipamentos cadastradosPOST/muralMuralController@storeCadastra um novo equipamento com fotoGET/mural/guitars/{guitar}/editMuralController@editExibe formulário de ediçãoPUT/mural/guitars/{guitar}MuralController@updateAtualiza os dados do equipamentoDELETE/mural/guitars/{guitar}MuralController@destroyRemove o equipamento do banco📄 LicençaEste projeto foi desenvolvido para fins de aprendizado e portfólio. Livre para uso e modificações.