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


## Resolução
Crie um database com o nome de warker

Faça a alteração do seu database no arquivo .env de acordo com sua conexão local.
ex:
DB_DATABASE=warker
DB_USERNAME=root
DB_PASSWORD=

Crie o projeto Laravel com versão 8:
composer create-project --prefer-dist laravel/laravel warker "8.*"

Crie a model Posto:
php artisan make:model Posto -mc

Crie a model Cidade
php artisan make:model Cidade -mc

Edite a migration Cidade:
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome_da_cidade');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

Edite a migration Posto (onde cidade_id(Posto) é chave estrangeira de id(Cidade) ):
 public function up()
    {
        Schema::create('postos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cidade_id');
            $table->integer('reservatorio');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');
        });

Edite a model Cidade com os campos corretos:
class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidades';
    protected $fillable = [
        'nome_da_cidade',
        'latitude',
        'longitude',
    ];
}

Edite a model Posto com os campos corretos:
class Posto extends Model
{
    use HasFactory;
    protected $table = 'postos';
    protected $fillable = [
        'cidade_id',
        'reservatorio',
        'latitude',
        'longitude',
    ];
}

Execute a migration Cidade para criação da tabela:
php artisan migrate --path=/database/migrations/2022_05_02_123857_create_cidades_table.php

Execute a migration padrão, que criará a tabela Posto(restante):
php artisan migrate

** Obs: Precisei executar a migration Cidade primeiro, pois apenas rodando o artisan migrate padrão não funcionou.

Adicione a rota api no arquivo api.php para adicionar cidades via POST:
Route::post('cidade/add', [CidadeController::class,'store']);

Altere o controller Cidade para receber os dados.

Para popular a tabela cidade, utilizei o POSTMAN(aplicativo) com a rota /api/cidade/add conforme abaixo:
http://127.0.0.1:8000/api/cidade/add

Adicione a rota api no arquivo api.php para adicionar postos via POST:
Route::post('posto/add', [PostoController::class,'store']);

Altere o controller Posto para receber os dados.

Para popular a tabela postos, utilizei o POSTMAN(aplicativo) com a rota /api/posto/add conforme abaixo:
http://127.0.0.1:8000/api/posto/add

No controller Posto, preciso adicionar uma função que pegue o id do posto por GET.
Podemos acessar esses dados através da url http://127.0.0.1:8000/api/posto/2

Foi feito uma validação nesse mesmo controller, onde se não existir o id, ele retorna uma mensagem:
{
    "mensagem": "Posto não encontrado!"
}
url de exemplo: http://127.0.0.1:8000/api/posto/5

Adicione a rota api no arquivo api.php para alterar postos via PUT:
Route::put('posto/{id}/update', [PostoController::class,'update']);

No controller de postos, tenho uma função semelhante ao de salvar, porem com o metodo update.
Podemos testar a função através do link: http://127.0.0.1:8000/api/posto/1/update

Adicione a rota api no arquivo api.php para deletar postos via DELETE:
Route::delete('posto/{id}/delete', [PostoController::class,'destroy']);
Podemos testar a função através do link: http://127.0.0.1:8000/api/posto/1/delete

No controller Cidade, preciso adicionar uma função que pegue o id da cidade por GET.
Nele, faço a busca da cidade, e pego o id da cidade para executar uma nova busca de postos que possuem esse id, e assim monto o JSON.
Podemos acessar esses dados através da url http://127.0.0.1:8000/api/cidade/2

Adicione a rota api no arquivo api.php para alterar cidades via PUT:
Route::put('cidade/{id}/update', [CidadeController::class,'update']);




