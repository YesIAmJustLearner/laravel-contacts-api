# Laravel Contacts API (Back End)

API em Laravel para gerenciamento de contatos com funcionalidades CRUD e autenticação.

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/YesIAmJustLearner/laravel-contacts-api.git
    ```
2. Vá para o diretório do projeto:
    ```bash
    cd laravel-contacts-api
    ```
3. Instale as dependências:
    ```bash
    composer install
    ```
4. Configure o ambiente:
    - Copie o arquivo `.env.example` para `.env`:
      ```bash
      cp .env.example .env
      ```
    - Edite o `.env` para configurar o banco de dados e outras variáveis.
5. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```
6. Execute as migrações do banco de dados:
    ```bash
    php artisan migrate
    ```
7. Inicie o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```
    Ou, para especificar um endereço IP:
    ```bash
    php artisan serve --host=192.168.1.100
    ```
   A API estará acessível em `http://localhost:8000` ou no IP especificado.

## Endpoints

- **Listar Contatos:** `GET /contacts`
- **Criar Contato:** `POST /contacts`
- **Visualizar Contato:** `GET /contacts/{id}`
- **Atualizar Contato:** `PUT /contacts/{id}`
- **Remover Contato:** `DELETE /contacts/{id}`

## Autenticação

Utiliza *Laravel Sanctum* para autenticação. Protege os endpoints com o middleware `auth:sanctum`.
