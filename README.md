# W16 Warker App - API

## Desenvolvedor

Olá! Muito obrigado por participar da avalição técnica para integrar a equipe de desenvolvimento da W16.

Criamos esta avaliação para avaliar seu conhecimento em lógica de programação, capacidade de investigar e conhecer novas ferramentas, organização e qualidade de código e especialmente, sua criatividade.

## Especificação
No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

## Regras
- Não há regras, não há lei, apenas a sobrevivência importa! 

## Recomendações
- Faça bom uso dos recursos do framework (migrations, factories, estrutura MVC, rotas...)
- D.R.Y. = "Don't Repeat Yourself"
- Mantenha o código limpo e organizado
- Utilize comentários pois alguém irá ler o seu código. Nosso último dev esqueceu um comentário importante. RIP :(
- Utilize o README.md do seu projeto para explicar instalação, funcionamento, o processo que usou para o desenvolvimento ou implorar por misericórdia.

## Importante
- Use Laravel 8
- Use Laravel 8
- Use Laravel 8
- Já mencionei que a versão do laravel é a v8?
- Lembre-se de usar os métodos GET,PUT,POST e DELETE.

## Pontos Extras
Pode contar pontos extras
- CRUD Web
- Autenticação
- Teste automatizado
- Seeder e uso de fakers

### Exemplo de tabelas:

Cidades
```
|id |nome_da_cidade|latitude|longitude|created_at|updated_at|
|int|string        |double  |double   |timestamp |timestamp |
```

Postos
```
|id |cidade_id|reservatorio|latitude|longitude|created_at|updated_at|
|int|int(fk)  |int(1-100%) |double  |double   |timestamp |timestamp |
```

### Endpoints esperados
/api/cidade/id
```
{
    id : id,
    cidade : nome_da_cidade,
    coords : {
            latitude : latitude,
            longitude : longitude
        },
    postos : {
        id : id,
        reservatorio : reservatorio,
        coords : {
            latitude : latitude,
            longitude : longitude
        },
        updated_at : updated_at,
        created_at : created_at
    }
}
```

/api/posto/id
```
{
    id : id,
    reservatorio : reservatorio,
    coords : {
        latitude : latitude,
        longitude : longitude
    },
    updated_at : updated_at,
    created_at : created_at
}
```

## Entrega
Crie um FORK deste repositório e faça um Pull-Request. Commite no repositório todo o código do backend, juntamente com instruções, se necessário. O prazo para entrega será de 7 horas - ou melhor, 7 dias.

Qualquer dúvida, crie um issue neste projeto ou entre em contato com o nosso time pelo instagram: @w16.softwarehouse

2 DEVS ENTRAM, 1 DEV SAI!


## Instruções

Após clonar ou baixar o projeto abra o prompt de comnando ou terminal, navegue até a pasta do projeto e execute o comando:
composer install

Obs: Caso não tenha o composer instalado você pode baixar por este link -> https://getcomposer.org/download/

Depois de rodar o comando acima, crie o banco de dados e efetue a conexão na aplicação através do arquivo .env
dessa maneira: 

// Tipo do banco de dados (mysql, pgsql, etc)
DB_CONNECTION=mysql

// Host do banco
DB_HOST=127.0.0.1

// A porta de conexão com o banco de dados
DB_PORT=3306

// Nome do banco de dados criado
DB_DATABASE=db_name

// Usuário do banco de dados
DB_USERNAME=user_name

// Senha do banco de dados, caso tenha
DB_PASSWORD=

Caso não tenha o arquivo .env, renomeie o arquivo .env.example para -> .env e use-o

Após fazer a conexão com o banco de dados, no prompt de comando, na pasta do projeto execute os seguintes comandos:
php artisan migrate
php artisan db:seed

Isso fará com que as tabelas do banco de dados sejam criadas e populadas com alguns dados

Obs: Caso prefira, dentro da pasta database tem um arquivo de inportação do banco de dados chamado w16_db.sql

Após os passos acima, a aplicação está pronta para uso.

Para rodar a aplicação em localhost você pode executar o seguinte comando no prompt de comando, na pasta do projeto:

php artisan serve

Isso fará com que o servidor da aplicação seja iniciado, podendo ser acessado dessa maneira http://localhost:8000

Você pode acessar os endpoints da API dessa maneira

// Endpoint de cidades
https://seudominio.com.br/api/cidade/id_da_cidade

ou se estiver em localhost

http://seu_ip/nome_da_pasta_do_projeto/public/api/cidade/id_da_cidade

ou

http://localhost:8000/api/cidade/id_da_cidade


// Endpoint de postos
https://seudominio.com.br/api/posto/id_do_posto

ou se estiver em localhost

http://seu_ip/nome_da_pasta_do_projeto/public/api/posto/id_do_posto

ou 

http://localhost:8000/api/posto/id_do_posto

////////////////////////////////////////////////////////////////////////////////

Você pode também acessar a aplicação no navegador:

https://seudominio.com.br/login

ou se estiver em localhost

http://seu_ip/nome_da_pasta_do_projeto/public/login

ou

http://localhost:8000/login

Para acessar a aplicação use o usuário pré-cadastrado no banco de dados com os dados
E-mail: admin@teste.com
Senha: 1234567

Ou se preferir pode clicar no botão cadastre-se na página de login e criar um novo cadastro