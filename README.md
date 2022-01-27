# W16 Warker App - API

## WARKER

Aplicação API REST em Laravel 8 para indicar os postos das cidades.

## O que o projeto contém
- Laravel 8
- CRUD Web
- Autenticação
- Seeder e uso de fakers

## Instalação
Para rodar o projeto faça essas configurações:
- Clone o projeto (utilizando comando git ou baixando em zip)
- Instale o composer
```
php composer install
php composer update
```
- Renomeie o .env.example para .env
- Configure o banco de dados como no exemplo abaixo
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=warker
DB_USERNAME=root
DB_PASSWORD=
```
- Rode a migrations para criar as tabelas do banco de dados
```
php artisan migrate
```
- Para popular com dados Fake utilize o comando abaixo
```
php artisan db:seed
```

## Endpoints
Para conseguir utilizar o <b>POST,GET,POST,PUT e DELETE</b> você pode está utilizando o Postman (programa gratuito). O Endpoints é formado de rotas publicas e rotas protegidas, as rotas públicas você consegue acessar sem o Bearer Token, as rotas protegidas você precisa deste token que é obtido através do login.

- Rotas públicas:
<b>Para se cadastrar</b>
<b>POST</b> /api/register
```
{
    "name": "Usuario teste",
    "email": "teste@teste.com",
    "password": "senha",
    "password_confirmation": "senha"
}
```

<b>Para se logar</b>
<b>POST</b> /api/login
```
{
    "email": "teste@teste.com",
    "password": "senha",
}
Será gerado um Token (Bearer Token) que será usado no HEADER para acessar as rotas protegidas.
```

- Rotas protegida (Todas é necessário informar o Token no HEADER):
<b>Para se deslogar</b>
<b>POST</b> /api/login

<b>Para visualizar todas as cidades cadastradas</b>
<b>GET</b> /api/cidade

<b>Para visualizar uma cidade específica</b>
<b>GET</b> /api/cidade/{id}

<b>Para armazenar uma cidade</b>
<b>POST</b> /api/cidade/
```
{
    "nome_da_cidade": "Sao Paulo",
    "latitude": 100.02,
    "longitude": -200.05,
}
```

<b>Para atualizar uma cidade específica</b>
<b>PUT</b> /api/cidade/{id}
```
{
    "nome_da_cidade": "São Paulo",
    "latitude": 300.18,
    "longitude": -200.05,
}
```

<b>Para remover uma cidade específica</b>
<b>DELETE</b> /api/cidade/{id}

<b>Para visualizar todos os postos cadastrados</b>
<b>GET</b> /api/posto

<b>Para visualizar um posto específico</b>
<b>GET</b> /api/posto/{id}

<b>Para armazenar um posto</b>
<b>POST</b> /api/posto/
```
{
    "cidade_id": 1,
    "reservatorio": 95,
    "latitude": 102.45,
    "longitude": -240.74",
}
```

<b>Para atualizar um posto específico</b>
<b>PUT</b> /api/posto/{id}
```
{
    "cidade_id": 1,
    "reservatorio": 90,
    "latitude": 300.71,
    "longitude": -200.45,
}
```

<b>Para remover um posto específico</b>
<b>DELETE</b> /api/posto/{id}

## Notas do Dev
Eu Leonardo queria agradecer a esta oportunidade que a W16 está proporcionando para todos os amantes da programação de todo o Brasil.