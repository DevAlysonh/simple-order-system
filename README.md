# Setup:

### 1- Clone  repositório;
### 2- Entre no diretório onde o repositório foi clonado;
### 3- Crie o arquivo database.sqlite na pasta storage:
```
    touch storage/database.sqlite
```
### 4- Copie o arquivo .env.example para .env:
```
    cp .env.example .env
```
### 5- Altere a conexão com o banco no arquivo .env, para:
```
    DB_CONNECTION=sqlite
    DB_DATABASE=./storage/database.sqlite
    DB_USERNAME=root
    DB_PASSWORD=
```
### 6- Instale as dependencias do composer:
```
    composer install
```
### 7- Execute as migrations:
```
    php artisan october:migrate
```
### 8- Gere a chave da aplicação:
```
    php artisan key:generate
```
### 9- Execute o servidor:
```
    php artisan serve
```

### Agora a aplicação deve estar disponível em http://localhost:8000
