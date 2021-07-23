# W16 Warker App - API

## Especificação
No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

## Regras
- Não há regras, não há lei, apenas a sobrevivência importa! 

---

## Observações iniciais
### Softwares & Hardwares
- Os seguintes recursos foram utilizados:
    - Máquina com Windows 10 versão 20H2.
    - Pacote XAMPP v7.4.14, no qual inclui:
        - PHP versão 7.4.13
        - MariaDB versão 10.4.17
    - Composer versão 2.0.12
    - Git versão 2.30.1.windows.1
    - Node.js versão 14.15.5
    - Postman versão 8.7.0
- Todas as instruções abaixo foram escritas somente para plataforma Windows.
- Não foi testado em outros sistemas.
### Projeto
- Todos os comandos do **artisan** devem ser feitos na raiz do projeto.
- Utilizei somente servidor web do artisan.
- Utilizei somente base de dados SQLite.
- Em relação aos testes automatizados
    - Os testes que eu desenvolvi estarão em `/tests/Feature/API`
- Em relação a contas de usuário
    - API possui operações CRU para usuários. (Sim, não tem operação de DELETE).
    - Você pode remover usuário através da interface web em **Perfil > Deletar conta**
- Em relação a comentários e documentação:
    - Utilizei notação PHPDoc para documentar algumas funções. 
    - Também há alguns locais que possuem comentário no local.
    - Desconheço notações padrão para documentar rotas de api. Então elaborei uma seção abaixo com informações da estrutura de [API REST](#api-rest) que desenvolvi.

---

## Checklist
- [x] Usar Laravel 8
- [x] Usar conceito D.R.Y
- [x] Manter código limpo e organizado
- [x] Usar métodos GET, PUT, POST e DELETE
- [x] API para operações CRUD de _cidades e postos_
- [x] CRUD Web
- [x] Autenticação (Web/API)
- [x] Teste automatizado (TDD)
- [x] Seeder e Fakers
- [x] Utilizar README.md para explicar instalação, funcionamento...
- [x] Uso de migrations, factories, estrutura MVC, rotas...

---

## Requisitos
- PHP >= 7
- Composer >= 2
- Node.js >= 14

## **(Opcional)** Instalação das ferramentas
- Faça o [download do XAMPP](https://www.apachefriends.org/pt_br/download.html) e instale.
- Faça o [download do Git](https://git-scm.com/downloads) e instale.
- Faça o [download do Node.js](https://nodejs.org/pt-br/download) e instale.
- Localize o local do **php.exe** e registre-o na variável PATH do sistema.
    - Está inclusa _na pasta de instalação do XAMPP_. 
    - Geralmente fica em _C:\xampp\php_.
- Instale o gerenciador de pacotes Composer. Execute o comando abaixo no prompt de comando para baixar e executar o script de instalação.
    ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ```

## **(Opcional)** Resolução de possíveis problemas
- **PHP** Não está presente no ambiente.
    - Opção 1 (Permanente):
        - Adicione caminho para o `php.exe` na variável de ambiente `PATH` nas configurações avançadas do sistema (Ex: `C:\xampp\php`).
        - **Sistema > Configurações Avançadas do Sistema > Aba "Avançado" > Botão "Variáveis de Ambiente"**.
    - Opção 2 (Temporária):
        - Com uma janela de prompt de comando aberta, execute `set PATH=%PATH%;<caminho_instalacao_php>`.

---

## Instruções
### Projeto: Inicialização e execução
- **(Opcional)** Abra uma janela do prompt de comando.
- **(Opcional)** Execute os comandos sugeridos a seguir para certificar a presença das aplicações no ambiente de comando.
    ```
    git --version
    php --version
    composer --version
    node -v
    ```
- **(Opcional)** Faça o clone do projeto em um local de sua preferência. Ao terminar o processo, mude para o local do projeto.
    ```
    git clone <endereço_repo_git> && cd w16-warker-app-api
    ```
- Instale as dependências de projeto.
    ```
    composer install
    npm install
    npm run dev
    ```
- Faça uma cópia do arquivo `.env.example` e renomeie-o para `.env`.
- Faça as seguintes ações para utilizar base de dados _sqlite_:
    - Abra arquivo `.env` e altere as seguintes linhas:
        ```sh
        DB_CONNECTION=sqlite
        #DB_HOST=127.0.0.1
        #DB_PORT=3306
        #DB_DATABASE=laravel
        #DB_USERNAME=root
        #DB_PASSWORD=
        ```
    - Crie arquivo `database.sqlite` dentro da pasta `database`.
- Inicialize a base de dados com os comandos a seguir.
    ```
    php artisan migrate
    php artisan db:seed --class=DatabaseSeeder
    ```
- Execute o servidor de desenvolvimento.
    ```
    php artisan serve
    ```
### Teste automatizado
- Execute o comando abaixo
    ```
    php artisan test
    ```
### Teste manual da API
- Busque a tabela [API REST](#api-rest) que está abaixo deste documento e tenha-o como referência para as etapas a seguir.
- Crie uma conta de usuário utilizando a endpoint `/api/register` e espere receber uma token de autorização. 
    - Esta token será usado para ter acesso as operações de CRUD das cidades e dos postos.
- Comece a fazer requisições sempre enviando as informações:
    - Token junto ao cabeçalho (Também conhecido como *Bearer Token*).
    - **Accept: application/json** (Isto é importante, visto que algumas operações acabam sendo redirecionadas.)
- De resto, todas as informações de métodos, rotas e parâmetros você encontra na tabela [API REST](#api-rest) abaixo.
### Teste manual da interface web
- Crie uma conta de usuário utilizando a rota `/register` e espere carregar o painel de controle ao fazer o registro.
- Há duas abas para testar funcionalidades de CRUD: **Cidades** e **Postos**.
- Agora é com você para testar as funcionalidades.

---

# API REST
## Tabela de operações
| Método    | Endpoint          | Req. Auth | Descrição                               | Query                                        | Ret. Objeto   | Ret. Código |
| --------- | ----------------- | ----------- | --------------------------------------- | -------------------------------------------- | -------- | ------ |
| GET/HEAD  | `/api/cidade`     | Sim         | Pegar todos os registros de cidade      | (vazio)                                      | cidade[] | 200    |
| GET/HEAD  | `/api/cidade/:id` | Sim         | Pegar um registro de cidade por id      | (vazio)                                      | cidade   | 200    |
| PUT/PATCH | `/api/cidade/:id` | Sim         | Atualizar um registro de cidade por id  | nome_da_cidade, latitude, longitude          | cidade   | 200    |
| POST      | `/api/cidade/:id` | Sim         | Criar um novo registro de cidade        | nome_da_cidade, latitude, longitude          | cidade   | 201    |
| DELETE    | `/api/cidade/:id` | Sim         | Remover um registro de cidade por id    | (vazio)                                      | (vazio)  | 204    |
| GET/HEAD  | `/api/posto`      | Sim         | Pegar todos os registros de posto       | (vazio)                                      | posto[]  | 200    |
| GET/HEAD  | `/api/posto/:id`  | Sim         | Pegar um registro de posto por id       | (vazio)                                      | posto    | 200    |
| PUT/PATCH | `/api/posto/:id`  | Sim         | Atualizar um registro de posto por id   | reservatorio, latitude, longitude            | posto    | 200    |
| POST      | `/api/posto/:id`  | Sim         | Criar um novo registro de posto         | cidade_id, reservatorio, latitude, longitude | posto    | 201    |
| DELETE    | `/api/posto/:id`  | Sim         | Remover um registro de posto por id     | (vazio)                                      | (vazio)  | 204    |
| GET/HEAD  | `/api/token`      | Sim         | Gerar um novo token de autorização      | (vazio)                                      | token    | 201    |
| GET/HEAD  | `/api/user`       | Sim         | Pegar perfil do usuário autenticado     | (vazio)                                      | user     | 200    |
| PUT       | `/api/user`       | Sim         | Atualizar perfil do usuário autenticado | name, email, password                        | user     | 200    |
| POST      | `/api/register`   | Não         | Criar um novo perfil de usuário         | name, email, password, password_confirmation | token    | 201    |
| POST      | `/api/login`      | Não         | Autenticar um usuário cadastrado        | email, password                              | token    | 200    |

## Objetos de resposta e outros
### Dados de **user** (Como em `/api/user`)
- Detalhes
    - Nenhum
- Estruturas
    ```json
    {
        "id": number,
        "name": "<text>",
        "email": "<text>",
        "updated_at": "<datetime>",
        "created_at": "<datetime>"
    }
    ```
### Dados de **cidade** (Como em `/api/cidade/:id`)
- Detalhes
    - Nenhum
- Estruturas
    ```json
    {
        "id" : number,
        "cidade" : "<text>",
        "coords" : {
            "latitude" : "<double>",
            "longitude" : "<double>",
        },
        "postos" : [
            {
                "id" : number,
                "reservatorio" : "<text>",
                "coords" : {
                    "latitude" : "<double>",
                    "longitude" : "<double>",
                },
                "updated_at" : "<datetime>",
                "created_at" : "<datetime>",
            }
        ]
    }
    ```
### Dados de **posto** (Como em `/api/posto/:id`)
- Detalhes
    - Nenhum
- Estruturas
    ```json
    {
        "id" : number,
        "reservatorio": "<text>",
        "coords": {
            "latitude": "<double>",
            "longitude": "<double>",
        },
        "updated_at": "<datetime>",
        "created_at": "<datetime>",
    }
    ```
### Dados de **token** (Como em `/api/token`)
- Detalhes
    - Nenhum
- Estruturas
    ```json
    {
        "token": "<text>"
    }
    ```
### Para objeto não encontrado
- Detalhes
    - Retorna código 404
    - Pode retornar uma das estruturas abaixo
- Estruturas
    ```json
    {
        "error": "<text>"
    }
    ```
    ```json
    {
        "message": "<text>"
    }
    ```
### Para usuários visitantes ou não autorizados
- Detalhes
    - Retorna código 401
- Estruturas
    ```json
    {
        "message": "Unauthenticated."
    }
    ```
