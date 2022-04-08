# W16 Warker App - API

Oi :)

Configurações
    Laravel 8 - Com PHP 7.4
    Docker - WSL2
    
Eis as instruções para uso

1. Antes de tudo, rode o serviço mysql no Docker
        
        docker run -e MYSQL_ROOT_PASSWORD=root -d -p 3306:3306 mysql:5.7    
        
2. Rode o composer

        composer install        
        
2. Depois de ter rodado o Docker e baixado os arquivos, pode rodar o migrate

        php artisan migrate:refresh --seed
        
3. Caso deseje ver os testes ( fiz com os Models )

        ./vendor/bin/phpunit --testdox tests/Models/
        
4. O JSON de envio via POST, PUT... Caso necessário
   
    {
    "id" : "1",
    "gasStation": {
        "latitude" : "66.902554",
        "longitude" : "154.121333",
        "reservatorio" : "58"
      }
    }
    
    
        
