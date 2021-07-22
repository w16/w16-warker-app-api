# W16 Warker App - API

## Especificação
No mundo pós-apocaliptico de 2021, o combustível tem um valor inestimável. Gangues bárbaras lutam até a morte pelo controle desse valioso recurso e a W16 está desenvolvendo o aplicativo WARKER, que é a última esperança da humanidade em trazer um pouco de paz e ordem à esse mundo devastado.
Esse aplicativo deve consumir uma API REST em Laravel que indica os postos de gasolina das diversas cidades, sua localização e o nível dos seus reservatórios. Lembre-se de que não há mais lei e a sua vida depende do sucesso desse backend. Marcopoc não fica feliz quando o seu app falha devido a erros no backend e você não quer deixar o Marcopoc irritado...

## Regras
- Não há regras, não há lei, apenas a sobrevivência importa! 

---

## Observações iniciais
- Os seguintes recursos foram utilizados:
    - Máquina com Windows 10 versão 20H2.
    - Pacote XAMPP v7.4.14, no qual inclui:
        - PHP versão 7.4.13
        - MariaDB versão 10.4.17
    - Composer versão 2.0.12
    - Git versão 2.30.1.windows.1
    - Node.js versão 14.15.5
- Utilizei somente servidor web do artisan.
- Utilizei somente base de dados SQLite.
- Todas as instruções abaixo foram escritas somente para plataforma Windows.
- Não foi testado em outros sistemas.

## (Opcional) Instalação das ferramentas
- Faça o [download do XAMPP](https://www.apachefriends.org/pt_br/download.html) e instale.
- Faça o [download do Git](https://git-scm.com/downloads) e instale.
- Faça o [download do Node.js](https://nodejs.org/pt-br/download) e instale.
- Localize o local do **php.exe** e registre-o na variável PATH do sistema.
    - Está inclusa _na pasta de instalação do XAMPP_  
    - Geralmente fica em _C:\xampp\php_
- Instale o gerenciador de pacotes Composer. Execute o comando abaixo no prompt de comando para baixar e executar o script de instalação.
    ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ```

## Instruções de inicialização e execução
- **(Opcional)** Abra uma janela do prompt de comando 
- **(Opcional)** Execute os comandos sugeridos a seguir para certificar a presença das aplicações no ambiente de comando.
    ```
    git --version
    php --version
    composer --version
    node -v
    ```
- **(Opcional)** Faça o clone do projeto em um local de sua preferência. Ao terminar o processo, mude para o local do projeto.
    ```
    git clone https://github.com/mobx7c7/w16-warker-app-api && cd w16-warker-app-api
    ```
- Instale as dependências de projeto.
    ```
    composer install
    npm init dev
    ```
- Faça uma cópia do arquivo `.env.example` e renomeie-o para `.env`
- Configurando base de dados sqlite:
    - Crie `database.sqlite` dentro da pasta `database`
    - Abra arquivo `.env` e ajuste as seguintes linhas:
        ```
        DB_CONNECTION=sqlite
        #DB_HOST=127.0.0.1
        #DB_PORT=3306
        #DB_DATABASE=laravel
        #DB_USERNAME=root
        #DB_PASSWORD=
        ```
- Inicialize a base de dados com os comandos a seguir:
    ```
    php artisan migrate
    php artisan db:seed --class=DatabaseSeeder
    ```
- Execute o servidor de desenvolvimento do artisan
    ```
    php artisan serve
    ```

## Resolução de possíveis problemas
- **PHP** Não está presente no ambiente
    - Opção 1 (Permanente)
        - Adicione caminho para o `php.exe` na variável de ambiente `PATH` nas configurações avançadas do sistema (Ex: `C:\xampp\php`)
        - **Sistema > Configurações Avançadas do Sistema > Aba "Avançado" > Botão "Variáveis de Ambiente"**
    - Opção 2 (Temporária)
        - Com uma janela de prompt de comando aberta, execute `set PATH=%PATH%;<caminho_instalacao_php>`

# Projeto
## Checklist
- [x] API para operações CRUD de cidades e postos.
- [x] CRUD Web
- [x] Autenticação (Web/API)
- [x] Teste automatizado (TDD)
- [x] Seeder e Fakers
- [x] Lembre-se de usar os métodos GET,PUT,POST e DELETE.
- [x] Use Laravel 8
- [x] Conceito D.R.Y.
- [x] Utilizar README.md para explicar instalação, funcionamento...
- [x] Mantenha o código limpo e organizado.
- [x] Uso de migrations, factories, estrutura MVC, rotas...
 
## Notas
- API possui operações CRU para usuários. (Sim, não tem DELETE)
- Os casos de teste que eu desenvolvi estão em `tests/Feature/API`
- Sobre comentários, documentação...
    - Utilizei notação PHPDoc para documentar algumas funções. 
    - Também há alguns locais que possuem comentário no local.
    - Desconheço notações padrão para documentar rotas de api, então fiz uma seção abaixo com informações básicas da api que desenvolvi.

# Operações da API REST
## Tabela de operações
| Método    | Endpoint          | Requer Auth | Descrição                             | Query                                        | Resposta | Codigo |
| --------- | ----------------- | ----------- | ------------------------------------- | -------------------------------------------- | -------- | ------ |
| GET/HEAD  | `/api/cidade`     | Sim         | Pegar todos os registros de cidade    | (vazio)                                      | cidade[] | 200    |
| GET/HEAD  | `/api/cidade/:id` | Sim         | Pegar um registro de cidade por id    | (vazio)                                      | cidade   | 200    |
| PUT/PATCH | `/api/cidade/:id` | Sim         | Alterar um registro de cidade por id  | (vazio)                                      | cidade   | 200    |
| POST      | `/api/cidade`     | Sim         | Criar um novo registro de cidade      | nome_da_cidade, latitude, longitude          | cidade   | 201    |
| DELETE    | `/api/cidade/:id` | Sim         | Remover um registro de cidade por id  | (vazio)                                      | cidade   | 204    |
| GET/HEAD  | `/api/posto`      | Sim         | Pegar todos os registros de posto     | (vazio)                                      | posto[]  | 200    |
| GET/HEAD  | `/api/posto/:id`  | Sim         | Pegar um registro de posto por id     | (vazio)                                      | posto    | 200    |
| PUT/PATCH | `/api/posto/:id`  | Sim         | Alterar um registro de posto por id   | (vazio)                                      | posto    | 200    |
| POST      | `/api/posto`      | Sim         | Criar um novo registro de posto       | cidade_id, reservatorio, latitude, longitude | posto    | 201    |
| DELETE    | `/api/posto/:id`  | Sim         | Remover um registro de posto por id   | (vazio)                                      | (vazio)  | 204    |
| GET/HEAD  | `/api/token`      | Sim         | Gerar um novo token de autorização    | (vazio)                                      | token    | 201    |
| GET/HEAD  | `/api/user`       | Sim         | Pegar perfil do usuário autenticado   | (vazio)                                      | user     | 200    |
| PUT       | `/api/user`       | Sim         | Alterar perfil do usuário autenticado | (vazio)                                      | user     | 200    |
| POST      | `/api/login`      | Não         | Autenticar um usuário cadastrado      | (vazio)                                      | token    | 200    |
| POST      | `/api/register`   | Não         | Criar um novo perfil de usuário       | (vazio)                                      | token    | 201    |

## Objetos de resposta e outros
### Objeto user (Como em `/api/user`) 
    ```json
    {
        "id": int,
        "name": string,
        "email": string,
        "updated_at": string,
        "created_at": string
    }
    ```
### Objeto cidade (Como em `/api/cidade/:id`)
    ```json
    {
        "id" : int,
        "cidade" : string,
        "coords" : {
            "latitude" : string,
            "longitude" : string,
        },
        "postos" : [
            {
                "id" : int,
                "reservatorio" : string,
                "coords" : {
                    "latitude" : string,
                    "longitude" : string,
                },
                "updated_at" : string,
                "created_at" : string,
            }
        ]
    }
    ```
### Objeto posto (Como em `/api/posto/:id`)
    ```json
    {
        "id" : int,
        "reservatorio" : string,
        "coords" : {
            "latitude" : string,
            "longitude" : string,
        },
        "updated_at" : string,
        "created_at" : string,
    }
    ```
### Para objeto não encontrado
- Retorna código 404 e uma das estruturas abaixo:
    ```json
    {
        "error": "(...)"
    }
    ```
    ```json
    {
        "message": "(...)"
    }
    ```
### Para usuários visitantes ou não autorizados
- Retorna código 401 e a estrutura abaixo:
    ```json
    {
        "message": "Unauthenticated."
    }
    ```