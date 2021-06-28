# W16 Warker App - API

## Sobre o Projeto

No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios.

## Instalação
Para rodar o projeto localmente é necessário fazer algumas configurações:
- Clone o projeto em seu computador
- Instale todas as dependências rodando o comando abaixo no terminal
```
composer install
```
- Renomeie o arquivo .env.example para .env e configure o acesso ao banco de dados
- Para rodar as migrations e criar as tabelas necessárias no banco de dados, execute o comando abaixo no terminal
```
php artisan migrate
```
- Para popular as tabelas do banco de dados, rode o comando abaixo no terminal
```
php artisan db:seed
```
- Para rodar o projeto, execute o comando abaixo no terminal
```
php artisan serve
```
- Para rodar os testes automatizados, execute o comando abaixo no terminal
```
./vendor/bin/phpunit
```
## Endpoints
Para ver os endpoints funcionando, será necessário usar o Postman ou outro de sua escolha

<br><b>Para registrar um novo usuário</b>

<b>POST</b> /api/register
```
Dados de exemplo para envio
{
    "name": "Novo usuário",
    "email": "novo_usuario@usuario.com",
    "password": "123456",
    "password_confirmation": "123456"
}
```
<br><b>Para fazer o login</b>

<b>POST</b> /api/login
```
Dados de exemplo para envio
{
    "email": "test@test.com",
    "password": "123456",
}
Será gerado um token para ser enviado no header das rotas protegidas
```
<br><b>Para fazer o logout</b>

<b>GET</b> /api/logout

Informar no HEADER o Authorization Bearer Token gerado no login

<br><b>Para fazer o logout</b>

<b>GET</b> /api/logout

Informar no HEADER o Authorization Bearer Token gerado no login

<br><b>Para atualizar o token</b>

<b>GET</b> api/refresh-token

Informar no HEADER o Authorization Bearer Token gerado no login

<br><b>Para listar todas as cidade</b>

<b>GET</b> /api/cidades

<br><b>Para mostrar cidade por ID</b>

<b>GET</b> /api/cidades/1

<br><b>Para cadastrar uma cidade</b>

<b>POST</b> /api/cidades/

Informar no HEADER o Authorization Bearer Token gerado no login
```
Dados de exemplo para envio
{
	"nome_da_cidade": "São Luís-MA",
	"latitude": -2.53073,
	"longitude": -44.3068
}
```
<br><b>Para alterar dados de uma cidade</b>

<b>PUT</b> /api/cidades/1

Informar no HEADER o Authorization Bearer Token gerado no login
```
Dados de exemplo para envio
{
	"nome_da_cidade": "Novo nome da cidade",
	"latitude": -2.53073,
	"longitude": -44.3068
}
```
<br><b>Para deletar uma cidade</b>

<b>DELETE</b> /api/cidades/1

Informar no HEADER o Authorization Bearer Token gerado no login

<br><b>Para listar todos os postos</b>

<b>GET</b> /api/postos

<br><b>Para mostrar postos por ID</b>

<b>GET</b> /api/postos/1

<br><b>Para cadastrar um posto</b>

<b>POST</b> /api/postos/

Informar no HEADER o Authorization Bearer Token gerado no login
```
Dados de exemplo para envio
{
	"cidade_id": 1,
    "reservatorio": 70,
	"latitude": -55.0318,
	"longitude": -24.2065
}
```
<br><b>Para alterar dados de um posto</b>

<b>PUT</b> /api/postos/1

Informar no HEADER o Authorization Bearer Token gerado no login
```
Dados de exemplo para envio
{
	"cidade_id": 1,
    "reservatorio": 80,
	"latitude": -55.0318,
	"longitude": -24.2065
}
```
<br><b>Para deletar um posto</b>

<b>DELETE</b> /api/postos/1

Informar no HEADER o Authorization Bearer Token gerado no login

## Repository Design Pattern
Foi utilizado o Repositort Pattern no desenvolvimento do Projeto. O Repository Pattern permite um encapsulamento da lógica de acesso a dados, impulsionando o uso da injeção de dependencia (DI) e proporcionando uma visão mais orientada a objetos das interações com a DAL.

## Agradecimentos
Obrigado pela oportunidade e pelo excelente desafio técnico. Que juntos possamos trazer um pouco de paz e ordem a esse mundo devastado.
