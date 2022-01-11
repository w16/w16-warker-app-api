<h1>Configuração Inicial</h1>

<h1>Configuração .env</h1>

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=w16<br>
DB_USERNAME=usuariobanco<br>
DB_PASSWORD=senhabanco<br>

<h3>Segue os comandos abaixo. (Ambiente Linux)</h3>
<ul>
  <li>
      <code>
      cd w16
      </code>
  </li>
  <li>
      <code>
        cp .env.example .env
      </code>
  </li>
  <li>
      <code>
        composer install
      </code>
  </li>
  <li>
      <code>
        php artisan key:generate
      </code>
  </li>
   <li>
      <code>
        php artisan migrate --seed
      </code>
  </li>
</ul>

<h1>Insominia (Caso você use Insomnia)</h1>
<h3>Dentro da raiz do projeto tem um arquivo <b>endpoints-insomi.json</b> baixe ele e exporta para o insomnia nesse arquivo contem todas rotas da API.</h3>