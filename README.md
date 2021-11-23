#Desenvolvimento 
 Primeiramente desenvolvi a API Pública com laravel, pois não tinha conhecimento sobre JWT. Criei as migrations, um seed simples, as rotas, models e controllers.  Depois de concluído, fui atras de aprender JWT para desenvolver API com autenticação. E por fim fiz um crud com react. Tive algumas dificuldades, como cors não habilitado e preciso melhorar na questão do react e organizar o código. 
# Instalação
<ul>
<li>1 - Clone o repositorio git clone. Irá conter três pastas 
    - WarkerApp : API Pública
    - WarkerAppAuth : API com Autenticação JWT
    - WarkerFront: Crud da tabela cidade consumindo API Pública
</li>
<li>2- Crie dois bancos de dados chamados : warkerApp e warkerappauth para testar as APIs.</li>
</ul>
# Teste API Pública

* 1- Abra no terminal o reporsitorio warkerApp
* 2- Altere os atributos no arquivo .env para os valores da sua máquina   
    DB_DATABASE=warkerapp
    DB_USERNAME=root
    DB_PASSWORD=
* 3- Execute os comandos:
    - php artisan migrate
    - php artisan db:seed
* 4- Abro seu gerenciador de banco de dados e no banco de dados warkeApp execute o script sql para adição do gatilho. Ele ta localizado na pasta database/sqls
* 5 - Execute o comando no terminal
    - php artisan serve
* 6- Rotas disponíveis para teste no postman
     method - rota - explicação 
    ** get  - api/posto/{id}  - Retorna os dados do posto especificado, substituir id por um número. Por padrão ja terá 20 postos cadastrados. 

    ** post - api/posto/store - Cadastrar um posto no banco de dados, recebe como parametro um json com os seguintes campos - cidades_id, reservatorio, latitude, longitude

    ** put - api/posto/update/{id} - Atualizar um posto no banco de dados, recebe como parametro um json com os seguintes campos - id , cidades_id, reservatorio, latitude, longitude

    ** delete - api/posto/delete/{id} - Exclui um posto no banco de dados


    ** get - api/cidade/{id} - Retorna os dados da cidade especificada e os postos que tem naquela cidade, substituir id por um número. Por padrão ja terá 10 cidades cadastrados.

    ** post - api/cidade/store - Cadastrar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - nome, latitude, longitude

    ** put - api/cidade/update/{id} - Atualizar uma cidade no banco de dados, recebe como parametro um json com os seguintes campos - id , nome, latitude, longitude

    ** delete - api/cidade/delete/{id} - Exclui uma cidade no banco de dados

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
