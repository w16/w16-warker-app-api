
## W16API

Esta API foi construida utilizando Laravel 8 + banco de dados MySQL/MariaDB.

    -As rotas da API estão contidas no diretório routes/api.php 
    -Os controllers da API estão contidos em app/Http/Controllers/api

    -Os resources estão contidos em app/Http/Resources

Esta API também contém um CRUD web

    -Suas rotas estão contidas em routes/web.php
    -Os controller estão contidos em app/Http/Controlles 
        -WebCidadeController.php
        -WebPostoController.php

O formato dos end-points, são definidos dentro do resource, e é retornado pelo Eloquent:collection em uma fução
acionada por uma rota específica.

Esta API contém factories e seeder, que podem ser utilizadas para gerar dados aleatórios para cada objeto.

## Requisições
    - composer
    - Docker Desktop
    - Subsistema Windows para Linux 2 (WSL2) esteja instalado e ativado
    - Servidor virtual com banco de dados MySQL/MariaDB

## Instalação 

    Após ter todos os requistos necessários instalados e configurados em sua máquina
    basta baixar os arquivos contios neste repositório remoto em um repositório local de sua preferencia

    Após o download do arquivo abra o terminal da sua máquina no diretório onde os arquivos estão contidos
    e execute o comando:
        - "composer install"

    Após a conclusão da instalação das dependencias

        - renomeie o arquivo ".env.exemple" para ".env"
        - configure os dados referente ao banco em que a api irá se conectar

        - no terminal novamente, execute o comando "php artisan migrate"
            este comando irá gerar as tabelas necessárias para o funcionamento da api, em seu banco de dados
        
    após isso, basta executar o comando "php artisan serve" e o servidor do laravel sera startado e você poderá abri o sistema
    em seu localhost utilizando a porta 8000. Ex: localhost:8000 ou 127.0.0.1:8000.

    Você pode cadastrar as cidades e postos relacionados pelo browser.

    Casa queira gerar os dados aleatórios de forma automatizada, basta entrar no seu terminal novamente e executar o comando
    "php artisan db:seed".
        -Este comando irá gerar 4 cidades aleatórias, e 3 postos para cada cidade.

        Estas especificações estão contidas em "database/seeders/CidadeTableSeeder.php";
