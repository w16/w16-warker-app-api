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
- Autenticação ok
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


# Instalação

1 - Clone o repositorio git clone. Irá conter três pastas 
    - WarkerApp : API Pública
    - WarkerAppAuth : API com Autenticação JWT
    - ReactCrud: Crud consumindo API que contem Autenticação
2- Crie dois bancos de dados chamados : warkerApp e warkerappauth para testar as APIs.


# Teste API Pública
1- Abra no terminal o reporsitorio warkerApp
2- Altere os atributos no arquivo .env para os valores da sua máquina   
    DB_DATABASE=warkerapp
    DB_USERNAME=root
    DB_PASSWORD=
2- Execute os comandos:
    - php artisan migrate
    - php artisan db:seed
3- Abro seu gerenciador de banco de dados e no banco de dados warkeApp execute o script sql para adição do gatilho. Ele ta localizado na pasta database/sqls
4- Execute o comando no terminal
    - php artisan serve
5- Rotas disponíveis para teste no postman
    method - rota - explicação 
    get  - api/posto/{id}  - Retorna os dados do posto especificado, substituir id por um número. Por padrão ja terá 20 postos cadastrados. 

    post - api/posto/store - Cadastrar um posto no banco de dados, recebe como parametro um json com os seguintes campos - cidades_id, reservatorio, latitude, longitude

    put - api/posto/update/{id} - Atualizar um posto no banco de dados, recebe como parametro um json com os seguintes campos - id , cidades_id, reservatorio, latitude, longitude

    delete - api/posto/delete/{id} - Exclui um posto no banco de dados


    get - api/cidade/{id} - Retorna os dados da cidade especificada e os postos que tem naquela cidade, substituir id por um número. Por padrão ja terá 10 cidades cadastrados.

    post - api/cidade/store - Cadastrar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - nome, latitude, longitude

    put - api/cidade/update/{id} - Atualizar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - id , nome, latitude, longitude

    delete - api/cidade/delete/{id} - Exclui uma cidade no banco de dados

# Teste API com autenticação JWT
1- Abra no terminal o reporsitorio warkerAppauth
2- Altere os atributos no arquivo .env para os valores da sua máquina   
    DB_DATABASE=warkerappauth
    DB_USERNAME=root
    DB_PASSWORD=
2- Execute os comandos:
    - php artisan migrate
    - php artisan db:seed
3- Abro seu gerenciador de banco de dados e no banco de dados warkeApp execute o script sql para adição do gatilho. Ele ta localizado na pasta database/sqls
4- Execute o comando no terminal
    - php artisan serve
5- Rotas disponíveis para teste no postman
    method - rota - explicação 
    post - api/register -  Para cadastrar um novo usuário para acessar a API , recebe um json com os seguintes campos - name, email, password
    post - api/login - Para realizar o login e assim ter acesso a API, recebe um json com os seguintes campos - email, password
    As rotas abaixo precisa está logado para serem acessadas: 
        post - api/logout - Encerrar a sessão 
        get  - api/posto/{id}  - Retorna os dados do posto especificado, substituir id por um número. Por padrão ja terá 20 postos cadastrados. 

        post - api/posto/store - Cadastrar um posto no banco de dados, recebe como parametro um json com os seguintes campos - cidades_id, reservatorio, latitude, longitude

        put - api/posto/update/{id} - Atualizar um posto no banco de dados, recebe como parametro um json com os seguintes campos - id , cidades_id, reservatorio, latitude, longitude

        delete - api/posto/delete/{id} - Exclui um posto no banco de dados


        get - api/cidade/{id} - Retorna os dados da cidade especificada e os postos que tem naquela cidade, substituir id por um número. Por padrão ja terá 10 cidades cadastrados.

        post - api/cidade/store - Cadastrar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - nome, latitude, longitude

        put - api/cidade/update/{id} - Atualizar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - id , nome, latitude, longitude

        delete - api/cidade/delete/{id} - Exclui uma cidade no banco de dados
