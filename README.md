<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

No mundo pós-apocaliptico em que vivemos, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 desenvolveu o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado. Esse aplicativo consome esta API internacionalizada em Laravel que disponibiliza para o APP os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios.

## Instalação

Para rodar o projeto localmente, precisamos fazer algumas configurações:

- Clone o projeto em seu computador
- Instale todas as dependências com o comando abaixo no terminal
```
composer install
```
- Renomeie o arquivo .env.example para .env e configure o acesso ao banco de dados.
- Vamos rodar as migrations para criar as tabelas necessárias no db, utilize o comando abaixo.
```
php artisan migrate:fresh
```
- Hora de popular o banco de dados:
```
php artisan db:seed
```
- Agora é só rodar o projeto e ter a vida salva com a API indicando os locais com gasolina.
```
php artisan serve
```

## Autenticação

O aplicativo chegou na mão de muitas pessoas e todo mundo sabia aonde tinha gasolina, para evitar que todos tenham acesso, nós da W16 criamos autenticação ultra secreta para utilizar a nossa API.

- Ao rodar o comando para popular o banco de dados, é criado um usuário para poder acessar:

| email            | password |
| -----            | -------- |
| marcopoc@w16.com | 12345678 |

- Rotas para cadastrar um novo usuário e para fazer login.

| Rota            | parâmetros |
| -----           | --------   |
| /api/register   | name, email, password   |
| /api/login      | email, password   |

Para utilizar as outras rotas, é necessário enviar o token de login através do header com Bearer Token.

## Insomnia

Para facilitar a integração, os endpoints foram exportados do Insomnia para o seguinte arquivo, você pode importar utilizando o Insomnia:
- Insomnia_2021-01-19.json

É importante criar também um environment, **caso não exista**, com o seguinte JSON:
```
{
  "AUTH_TOKEN": "<INSERIR_TOKEN_DE_LOGIN>"
}
```

## Agradecimentos

Queria agradecer a toda a equipe W16 que ficou determinada em mudar o mundo para melhor, trazendo a paz para as pessoas.
O trabalho durou cerca de 10 horas, utilizando recursos profissionais do framework Laravel. 
Foi tranquilo fazer e estou feliz em poder fazer parte dessa história!
Poderiamos melhorar criando uma tabela unificada de coordenadas e apenas relacionar por ID, adicionem no backlog para próxima atualização.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
