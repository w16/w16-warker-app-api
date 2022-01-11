<h1>Configuração Inicial</h1>

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
</ul>
<hr>
<h1>Configuração .env</h1>

<code>
  DB_CONNECTION=mysql<br>
  DB_HOST=127.0.0.1<br>
  DB_PORT=3306<br>
  DB_DATABASE=w16<br>
  DB_USERNAME=usuariobanco<br>
  DB_PASSWORD=senhabanco<br>
</code>
