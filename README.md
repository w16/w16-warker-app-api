# W16 Warker App - API

## Desenvolvedor

Olá! Muito obrigado por participar da avalição técnica para integrar a equipe de desenvolvimento da W16.

Criamos esta avaliação para avaliar seu conhecimento em lógica de programação, capacidade de investigar e conhecer novas ferramentas, organização e qualidade de código e especialmente, sua criatividade.

## Projeto
No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

## Pré-requisito
Para rodar o projeto se faz necessário haver um banco de dados **MySQL** denominado **warker**.

    create database warker

## Instalação

Clone o projeto;

Renomear o arquivo ".env.example" para ".env" e informar o usuário e senha de acesso ao banco de dados, alterando os parâmetros DB_USERNAME e DB_PASSWORD.

 Abra o terminal, vá para a pasta do projeto e execute os comandos abaixo:
 Instale todas as dependências
 

     composer install

Execute as migrations

    php artisan migrate

Crie chaves de criptografia necessárias para gerar tokens de acesso seguro do passport

    php artisan passport:install
    php artisan key:generate

Popular o banco de dados

    php artisan db:seed

Execute o servidor web interno no Laravel

    php artisan serve

## Endpoints

Utilizar o Postman ou outro de sua preferencia

No momento em que o banco foi populado, o usuário abaixo foi inserido no banco, use-o para efetuar login.

| E-mail| Password |
|--|--|
| admin@w16.com| 123456|


 Após efetuar login através do endpoint **POST /api/login** , será retornado um token de acesso, utilize-o como Bearer Token no header das próximas requisições.

Para inserir um novo usuário utilize o endpoint  **POST /api/user** para atualizar **PUT /api/user/id** e deletar **DELETE /api/user/id**

Para efetuar logout utilize o endpoint **GET /api/logout**

Todos os demais endpoints para **cidades** e **postos** estão conforme orientado.

## Agradecimento
Obrigado equipe W16 pela oportunidade de participação deste desafio.