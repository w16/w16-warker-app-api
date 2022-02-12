Rio de Janeiro 12/02/2022
Candidato: alan paulo dos santos

Olá, Tudo Bem?

Tecnologias:
PHP 7.4.3
Composer
Laravel 8
Mysql


Manual de Uso


1) Setup ******************

a) Na raiz do projeto abra o terminal e rode o comando
composer install


b) No arquivo .env configure o banco de dados segundo o exemplo: 

DB_CONNECTION=mysql
DB_HOST=localhost_do_banco
DB_PORT=porta_do_servidor
DB_DATABASE=seu_banco
DB_USERNAME=seu_username
DB_PASSWORD=sua_senha

c) No terminal rode o comando
php artisan migrate


2) End points modelo de Objetos para requisição

**********************************************
a) Cidade: /api/cidade/

###
GET:
[
  {
    "id": 1,
    "nome_da_cidade": "Minas Gerais",
    "latitude": "20",
    "longitude": "40",
    "created_at": "2022-02-11T20:26:58.000000Z",
    "updated_at": "2022-02-11T20:57:11.000000Z"
  }

]
###
GET:{id}
{
  "postos": {
    "id": 1,
    "reservatorio": "ipiranga",
    "coords": {
      "latitude": "20",
      "longitude": "40"
    },
    "updated_at": "2022-02-11T22:13:24.000000Z",
    "created_at": "2022-02-11T21:55:56.000000Z"
  }
}
###
POST:
{
    
    "nome_da_cidade":"Rio de Janeiro",
    "latitude":"20",
    "longitude":"40"
  
}
###
PUT:{id}
{
    
    "nome_da_cidade":"Rio de Janeiro",
    "latitude":"20",
    "longitude":"40"
  
}
###
DELETE:{id}
{

}


*******************************************
b) Posto: /api/posto/

###
GET:
[
    {
        "id": 1,
        "cidades_id": 1,
        "reservatorio": "ipiranga",
        "latitude": "20",
        "longitude": "40",
        "created_at": "2022-02-11T21:55:56.000000Z",
        "updated_at": "2022-02-11T22:13:24.000000Z"
    }
]


###
GET:{id}
{
    "id": 1,
    "reservatorio": "ipiranga",
    "coords": {
    "latitude": "20",
    "longitude": "40"
    },
    "created_at": "2022-02-11T21:55:56.000000Z",
    "updated_at": "2022-02-11T22:13:24.000000Z"
}

###
POST:
{

      "cidades_id": 1,
      "reservatorio": "tucano",
      "latitude": "20",
      "longitude": "40"
  
}

###
PUT:{id}
{

      "cidades_id": 1,
      "reservatorio": "tucano",
      "latitude": "20",
      "longitude": "40"
  
}

###
DELETE:{id}
{

}


***Obs***
A tabela Cidades e Postos possuem um relacionamento.
de 1 para muitos, podendo ser cadastrado 1 ou varios postos
relacionados com uma unica cidade e retornado como json.
bastaria somente uma alteração no metodo de retorno.
