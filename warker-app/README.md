# W16 Warker App - API

## Configuração

#### Instalação das Dependências
entre no diretório pelo terminal e digite o comando para instalar as dependências:
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
DB_DATABASE=warkerdb
DB_USERNAME=root
DB_PASSWORD=suasenha
```
#### Fazendo as Migrações para o Banco de dados
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
