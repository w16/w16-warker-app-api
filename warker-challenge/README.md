# API WARKER CHALLENGE

## Como instalar o projeto

```
composer install

php artisan migrate
```
## Como rodar as Seeder

```

php artisan db:seed
``` 

## Rotas

- Para poder cadastrar, atualizar e deletar cidades ou postos e preciso estar autenticado;
- O Header da Aplicação para as rotas da cidade  e postos deve receber: 
 ```
 Accept: application/json
 Content-Type:application/json
 ```

- Rota de Autenticação [POST]
```php
##Cadastrar usuário /api/user/register
{
	"name":"Teste",
	"email":"matheusdepaul527@gmail.com",
	"password":"123456"
}

## Retorno 
{
	"success": "Usuário criado",
	"_token": "Bearer Type"
}
```


- Rota de Login [POST]
```php
##Login usuário /api/user/register

{
	"email":"matheusdepaul527@gmail.com",
	"password":"123456"
}
## Retorno 
{
	"success": "Usuário autenticado",
	"_token": "Bearer Type"
}
```


- Rotas para Cidades 

```php
##[GET] Retorna cidades e postos - /api/city/{id}

## Retorno 
    "id": 1,
	"cidade": "Cidade",
	"coords": {
		"latitude": -22.42,
		"longitude": -44.31
	},
	"postos": [
		{
			"id": 1,
			"reservatorio": 20,
			"coords": {
				"latitude": -22.42,
				"longitude": -44.31
			},
			"updated_at": "14-05-2022",
			"created_at": "14-05-2022"
		},
    ]
```


```php
##[POST] Cadastra Cidade - /api/city

{
	"nome_da_cidade":"Cidade",
	"latitude":-25.55563345,
	"longitude":25.5645
}

## Retorno 
   {
	"success": "Cidade criada"
    }
```




```php
##[DEL] Apaga Cidade - /api/city/{id}

## Retorno 
   {
	"success": "Cidade apagada"
}
```




```php
##[PUT] Retorna cidades e postos - /api/city/{id}
## Dados que deseja alterar 

{
	"nome_da_cidade":"Cidade",
	"latitude":-25.55563345,
	"longitude":25.5645
}

## Retorno 
    {
	"success": "Cidade alterada"
}
```

- Rotas para Postos 


```php
##[GET] Retorna  postos - /api/posto/{id}

## Retorno 
    {
	"id": 2,
	"reservatorio": 20,
	"coords": {
		"latitude": -22.42,
		"longitude": -44.31
	},
	"updated_at": "14-05-2022",
	"created_at": "14-05-2022"
}
```


```php
##[POST] Cadastra Posto - /api/posto

{
	"reservatorio":20,
	"cidade_id":4,
	"latitude":25.5645,
	"longitude":25.5645
}

## Retorno 
   {
	"success": "Posto criada"
}
```




```php
##[DEL] Apaga Cidade - /api/posto/{id}

## Retorno 
   {
	"success": "Posto apagado"  
    }
```




```php

##[PUT] Retorna cidades e postos - /api/posto/{id}
## Dados que deseja alterar 

{
	"reservatorio":"sdfsd"
}

## Retorno 
    {
	"success" => "Posto alterado"
    }

```
