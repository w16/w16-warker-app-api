# W16 Warker App - API

<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Como executar o projeto <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->  
<h2> :computer: Como executar o projeto </h2>

<!-- Pré-requisitos -->  
<!--  <h3> Pré-requisitos</h3>
    <ul>
      <li> Módulo <strong>numpy</strong>. </li>
      <li> Módulo <strong>pygame</strong>. </li>      
     </ul> -->

```bash
# Clone este repositório
$ git clone https://github.com/cleidsonsouza/w16-warker-app-api.git

# Acesse a pasta do projeto
$ cd w16-warker-app-api.git

# Atualize o pip
$ pip install --upgrade pip

# Instale as dependências
$ pip install -r requirements.txt

# Execute o projeto (para criar o banco de dados)
$ python3 main.py

# Execute o projeto (para consumir a API)
$ python -m uvicorn main:app --reload

# Realize simulações utilizando o endereço abaixo (ou outra ferramenta)
$ http://127.0.0.1:8000/docs

# Observação:
$ Para inserir datas, utilize o seguinte padrão: 2022-05-11 12:20:30

```

<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Licença <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->     
<h2> :unlock: Licença</h2>
<p> Este projeto está sob a <a href="https://github.com/cleidsonsouza/n-rainhas-2018/blob/master/LICENSE"> licença MIT</a>. </p>
