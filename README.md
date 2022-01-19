////////////////    Instruções    ////////////////

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