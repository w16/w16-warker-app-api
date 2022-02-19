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
# W16 Warker App - API

## Desenvolvedor

Olá! Muito obrigado por participar da avalição técnica para integrar a equipe de desenvolvimento da W16.

Criamos esta avaliação para avaliar seu conhecimento em lógica de programação, capacidade de investigar e conhecer novas ferramentas, organização e qualidade de código e especialmente, sua criatividade.

## Especificação
No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

## Regras
- Não há regras, não há lei, apenas a sobrevivência importa! 

---
## Requisitos
- PHP >= 7
- Composer >= 2
---
## Importante
- [x] Use Laravel 8
- [x] Use Laravel 8
- [x] Use Laravel 8
- [x] Já mencionei que a versão do laravel é a v8?
- [x] Lembre-se de usar os métodos GET,PUT,POST e DELETE.

## Pontos Extras
Pode contar pontos extras
- [ ] CRUD Web
- [x] Autenticação
- [x] Teste automatizado
- [x] Seeder e uso de fakers

---

## Requisitos
- PHP >= 7
- Composer >= 2
---
## Instruções
## Configuração Sem Docker

#### Instalação das Dependências
entre no diretório `api` pelo terminal e digite o comando para instalar as dependências:
```shell
$ composer install
```
#### Configuração do .env
Crie um arquivo chamado `.env` 

Procure um arquivo chamado `.env.example` e copie todo o conteúdo desse arquivo e cole no arquivo `.env` criado

Feito isso, rode o seguinte comando para preencher o APP_KEY do .env

```shell
$ php artisan key:generate
```

#### Conexão com Banco de Dados MYSQL
Novamente no `.env` preencha os campos a seguir:

por padrão o `.env` do Laravel virá com as conexões do MYSQL, porém verifique e preencha:
```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=warker
DB_USERNAME=root
DB_PASSWORD=root
```
#### Inicialização do Banco de Dados
Com o seu banco criado e o passo acima realizado, digite o comando para migrar as tabelas para o banco de dados:
```shell
$ php artisan migrate
```

#### Populando o Banco de dados
Digite o comando a seguir para enviar os seeds e popular o banco de dados:
```shell
$ php artisan db:seed
```

#### Executar App
Digite o comando a seguir para executar
```shell
$ php artisan serve
```
#### Teste automatizado
- Execute o comando abaixo
    ```
    php artisan test
    ```
---
## Configuração Com Docker
Os conteiners estão configurados com Banco de Dados, Laravel e NGIX, eles estão conectados por uma network e 
#### Implatação e Execução App
no diretório  raiz pelo terminal e digite o comando para subir os containers com o banco de dados:
```shell
$ docker-compose up
```
#### Implatação dos Conteiners
no diretório  raiz pelo terminal e digite o comando para extrar no bash do container:
```shell
$ docker exec -it warker-api bash
```
#### Inicialização do Banco de Dados
Com o seu banco criado e o passo acima realizado, digite o comando para migrar as tabelas para o banco de dados:
```shell
$ php artisan migrate
```

#### Populando o Banco de dados
Digite o comando a seguir para enviar os seeds e popular o banco de dados:
```shell
$ php artisan db:seed
```
#### Teste automatizado
Execute o comando abaixo
```shell
$ php artisan test
```
---
## Endpoints
Para conseguir utilizar o <b>POST, GET, POST, PUT e DELETE</b> você pode está utilizando o Postman (programa gratuito). O Endpoints é formado de rotas publicas e rotas protegidas, as rotas públicas você consegue acessar sem o Bearer Token, as rotas protegidas você precisa deste token que é obtido através do login.
<br>
- Rotas sem autenticação:

<b>Para se cadastrar</b><br>
<b>POST</b> /api/auth/register
```
{
    "name": "name",
    "email": "name@email.com",
    "password": "password",
    "password_confirmation": "password"
}
```

<b>Para se logar</b><br>
<b>POST</b> /api/auth/login
```
{
    "username": ""name@email.com",
    "password": "password",
}
```

- Rotas com autenticação:

```
Authorization -> Bearer TOKEN
```

<b>Para se deslogar</b><br>
<b>POST</b> /api/login<br>

<b>Para visualizar todas as cidades</b><br>
<b>GET</b> /api/cidade<br>
<br>
<b>Para visualizar uma cidade</b><br>
<b>GET</b> /api/cidade/{id}<br>
<br>
<b>Para armazenar uma cidade</b><br>
<b>POST</b> /api/cidade/
```
{
    "nome_da_cidade": (string),
    "latitude": (double),
    "longitude": (double),
}
```

<b>Para atualizar uma cidade</b><br>
<b>PUT</b> /api/cidade/{id}
```
{
   "nome_da_cidade": (string),
    "latitude": (double),
    "longitude": (double),
}
```

<b>Para remover uma cidade</b><br>
<b>DELETE</b> /api/cidade/{id}<br>
<br>
<b>Para visualizar todos os postos</b><br>
<b>GET</b> /api/posto<br>
<br>
<b>Para visualizar um posto</b><br>
<b>GET</b> /api/posto/{id}<br>
<br>
<b>Para armazenar um posto</b><br>
<b>POST</b> /api/posto/
```
{
    "cidade_id": (integer),
    "reservatorio": (integer),   
    "latitude": (double),
    "longitude": (double),
}
```

<b>Para atualizar um posto</b><br>
<b>PUT</b> /api/posto/{id}
```
{
    "cidade_id": (integer),
    "reservatorio": (integer),   
    "latitude": (double),
    "longitude": (double),
}
```

<b>Para remover um posto</b><br>
<b>DELETE</b> /api/posto/{id}<br>
<br>