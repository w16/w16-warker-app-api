<h1>SURVIVEAPI</h1>
Precisamos sobreviver neste mundo pós apocaliptico e para isso precisamos unir forças.
Criei esta api para que possamos cadastrar a sua cidade e os postos de abastecimento.
Aqui você poderá consultar os postos de abastecimento em cada cidade e poderá também cadastrar outros para ajusar outros sobreviventes.

Bem vindo, e esperamos sinceramente que vc não seja um zumbi.

<h2>EXPLICAÇÃO DO PROJETO</h2>
Para o projeto utilizei o venv como máquina virtual, instalei o fastapi(claro, rsrs), o uvicorn e o ormar.
O banco de dados trabalhei com o SQLite

Tive dificuldades na validação dos tipos de datas(datetime ou Timestamp)





## Especificação

No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

- Utilize o README.md do seu projeto para explicar instalação, funcionamento, o processo que usou para o desenvolvimento ou implorar por misericórdia.

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

Crie um FORK deste repositório e faça um Pull-Request. Commite no repositório todo o código do backend, juntamente com instruções, se necessário. O prazo para entrega será de 3 horas - ou melhor, 3 dias.

Qualquer dúvida, crie um issue neste projeto ou entre em contato com o nosso time.

2 DEVS ENTRAM, 1 DEV SAI!
