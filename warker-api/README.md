# Overview
- The project was created using version 8 of Laravel as required.


# Steps

- At first I spent some time reading the Read me file, cloning, and understanding the challenge.
- After I've created the backend project using composer.
- With the project created the first thing I've done was to set up the database configuration. *(In this case MySql)*
- For database environment I use Xampp because it is a simple and fast way to mock database servers. the database name is going to be "warker".
- Now with database done already, I've create the the models, controllers and migrations for the projects. In the challenge description is being asked just two entities.
	+ City.
	+ Gas Station.
- City has got to be created first in order to avoid errors with foreign key while migrating. *(That's because migrations are executed in order of creation time, and we want to avoid problems renaming migrations later)*
- For creating the entities I've used the same command line to generate seeders, models, migrations, and controllers at once.

```
php artisan make:model City -msc
```
```
php artisan make:model GasStation -msc
```

- In the command above there are three flags grouped together
	+ m | Stands for migration.
	+ s | Stands for seeder.
	+ c | Stands for controller.

- I've tried to avoid extra work and precious time so I let laravel name tables and classes according to its patterns.
- Then I've tried to migrate the project to check out if everything is running properly. *(I like to verify the work done from time to time so that I can fix the fresh errors and avoid have to do it when I've already forgotten what I did)*
- After I created the routes that have been required in the read me.

- Then I stated the model protection using the fillable attibute.


- Now it's time to create the controller for the entities.

- While I was creating controller I tested each one of the Crud methods using insominia to sent the requests.

- After the endpoints were already done I skiped to the create the authentication.

- To authenticate our api I've used sanctum package which is suggested in the Laravel documentation.

- In my case sanctum has already come per-installed in the project so I haven't needed to gone through the installation process.
-  The First thing I've done is to create an AuthController to handle all the Authentication process with the proper methods, in this case, register, login, and logout. the methods are not implemented yet.
-  After I created the routes group. I've grouped together the routes that should be verified by the middleware so that I avoided repeating code. *(Remembering the AuthMiddleware is auto created with sactum when installing the project)*.

- After created the group route, I've implemented the body of AuthController methods. testing the while coding.


- After the Authentication was created I've made the Seeders. The seeders file were created with the controllers and models so I just had to declare the eloquent insert methods and the call the City and GasStations Seeders in the database Seeder. *(The parent's table seeders should be called first, otherwise there will be error whenever eloquent try to create foreign keys)*
- For the user it has already come with a buit in factory so it's just need to call it in DatabaseSeeder.




# Getting ready to run the project

- Set a database enviroment to run the project, and keep it running. *(In my case I'm using xampp with mysql)*
 - Create a new database to store your app data *(JUST CREATE THE DATABASE AND NOTHING ELSE)*
- Make the clone to the project in any directory you want.
- Open a terminal project and navigate to the project directory.
- Now run the following commands in the terminal.
	
	To install the project depencencies:

	 ```
	 composer install
	 ```
	 
	To create the .env file:

	```
	cp .env.example .env
	```
	
	To generate the app key which is required:
	
	```
	php artisan key:generate
	```
	
	To refresh the project

	```
	composer dump-autoload
	
	```
	
- After doing this fill the database information in .env file.

```
DB_CONNECTION=<DRIVE OF YOUR DATABASE (SEE LARAVEL DOCUMENTATION)>
DB_HOST=<YOUR HOST>
DB_PORT=<PORT WHERE IT IS LINSTENING TO>
DB_DATABASE=<YOUR DATABASE>
DB_USERNAME=<YOUR USERNAME>
DB_PASSWORD=<THE DATABASE PASSWORD>

```
- Now, with database information done let's start the the app and run the migrations to create our database tables and constraints.

	Run the following command in other separate terminal to start the application:

	```
	php artisan serve
	
	```

	Run the migrations using the command bellow:

	```
	php artisan migrate	
	
	```
	
	Now run the next command to seed our database with some registers.
	
	```
	php artisan db:seed
	
	```
	
# Preparing Request Environment

- To send requests to the API you can use a software of your choise to handle it *(Insominia, Post etc)* in this case I'm going to use Insominia.

- Before start to test to your API you should specify that you expect a json response in the header of your request. So do like bellow.
	- ![](documentation\HeaderAcceptJSON.png)

- The authentication is mandatory to use the api so before send any request ensure that you are registered and your token is already generated. *(The requests and endpoints are described in this document)*

- Once you have your token place this in the Bearer Token of your request, like shown in the image:

	- ![](documentation\PlacingToken.png)
	
# Sending some requests

### Login



- **Method:** POST
- **Request Body:** Query String | JSON
- **Path:** .../api/login/
- **Expected data:**

	```
	{
	  	"email": "zshanahan@example.com",
	  	"password": "123456"
	}
	```
- **Respose Body Format**

  ```
{
	  "message": "Login realizado",
	  "data": {
	    "user": {
	      "id": 2,
	      "name": "Marc Powlowski",
	      "email": "zshanahan@example.com",
	      "email_verified_at": "2022-02-22T02:49:56.000000Z",
	      "created_at": "2022-02-22T02:49:56.000000Z",
	      "updated_at": "2022-02-22T02:49:56.000000Z"
	    },
	    "token": "3|05MjdLD5xlujgRtV1xYL8yGDdTdtCxUan9QGqRqW"
	  }
}
  
  ```
  
 OBS: You can use the email in users table to log in your api application. The default PASSWORD is 123456. Some data are already included in database if you ran the seeders properly.
  
##

### Register


- **Method:** POST
- **Request Body:** Query String | JSON
- **Path:** .../api/register/
- **Expected data:**

	```
	{
		"name" : "Charles",
		"email": "charles@testmail.com",
		"password" : "123456",
		"password_confirmation" : "123456"
	}
	```
- **Respose Body Format**
	
	```
{
	  "message": "Usuário com sucesso",
	  "data": {
	    "user": {
	      "name": "Charles",
	      "email": "charles@testmail.com",
	      "updated_at": "2022-02-22T03:10:17.000000Z",
	      "created_at": "2022-02-22T03:10:17.000000Z",
	      "id": 4
	    },
	    "token": "4|RD57eR0Xb5QAiDJS4D4230sRxAWlp0q9MhnwKm0E"
	  }
}
	
	```
	
##

### Logout


- **Method:** POST
- **Request Body:** None
- **Path:** .../api/logout/
- **Expected data:** None.
- **Respose Body Format**
	
	```
{
	 "message": "Logout realizado"
}
	```
	
##

### Retrieve All Gas Stations


- **Method:** GET
- **Request Body:** None.
- **Path:** .../api/posto/
- **Expected data:** None.
- **Respose Body Format**
	
	```
	[
	  {
	    "id": 1,
	    "reservatorio": 58,
	    "coords": {
	      "latitude": 1453132,
	      "longitude": 45645314
	    },
	    "updated_at": null,
	    "created_at": null
	  },
	  {
	    "id": 2,
	    "reservatorio": 58,
	    "coords": {
	      "latitude": 1453132,
	      "longitude": 45645314
	    },
	    "updated_at": null,
	    "created_at": null
	  },
	  {
	    "id": 3,
	    "reservatorio": 58,
	    "coords": {
	      "latitude": 1453132,
	      "longitude": 45645314
	    },
	    "updated_at": null,
	    "created_at": null
	  }
	]
	```
	
##

### Retrieve A Single Gas Station


- **Method:** GET
- **Request Body:** Query String.
- **Path:** .../api/posto/id/*{ID do registro}*
- **Expected data:** Register's id in query string.
- **Respose Body Format**
	
	```
	{
	  "id": 2,
	  "reservatorio": 58,
	  "coords": {
	    "latitude": 1453132,
	    "longitude": 45645314
	  },
	  "updated_at": null,
	  "created_at": null
	}
	```
	
OBS: I haven't followed the api pattern here in order to respect what the endpoint format asked in the Read me.

##

### Create Gas Station


- **Method:** POST
- **Request Body:** Query String | JSON.
- **Path:** .../api/posto/adicionar/
- **Expected data:**

	```
	{
		"reservatorio":"75",
		"latitude": "4658456",
		"longitude": "216.549",
		"cidade_id": "2"
	}	

	```
- **Respose Body Format**
	
	```
	{
	  "message": "Posto registrado"
	}
	```

##


### Update Gas Station


- **Method:** PUT
- **Request Body:** Query String | JSON.
- **Path:** .../api/posto/editar/*{ID do registro}*
- **Expected data:**

	```
	{
		"reservatorio":"58",
		"latitude": "45675",
		"longitude": "16545",
		"cidade_id": "2"
	}
	```
- **Respose Body Format**
	
	```
	{
	  "message": "Posto Atualizado"
	}
	```
	
	
##

### Delete Gas Station


- **Method:** DELETE
- **Request Body:** Query String.
- **Path:** .../api/posto/deletar/*{ID do registro}*
- **Expected data:** None.
- **Respose Body Format**
	
	```
		{
			"message":"Posto deletado com sucesso"
		}
	```
	
	
##

### Retrieve All Cities


- **Method:** GET
- **Request Body:** None.
- **Path:** .../api/cidade/
- **Expected data:** None.
- **Respose Body Format**
	
	```
	{
	  "message": "Login realizado",
	  "data": [
	    {
	      "id": 1,
	      "cidade": "cidade1",
	      "coords": {
	        "latitude": 4589674865,
	        "longitude": 774657946
	      },
	      "postos": [
	        {
	          "id": 1,
	          "reservatorio": 58,
	          "coords": {
	            "latitude": 1453132,
	            "longitude": 45645314
	          },
	          "updated_at": null,
	          "created_at": null
	        },
	        {
	          "id": 2,
	          "reservatorio": 58,
	          "coords": {
	            "latitude": 1453132,
	            "longitude": 45645314
	          },
	          "updated_at": null,
	          "created_at": null
	        }
	      ]
	    },
	    {
	      "id": 2,
	      "cidade": "cidade2",
	      "coords": {
	        "latitude": 4589674865,
	        "longitude": 774657946
	      },
	      "postos": [
	        {
	          "id": 3,
	          "reservatorio": 58,
	          "coords": {
	            "latitude": 45675,
	            "longitude": 16545
	          },
	          "updated_at": "2022-02-22T03:56:23.000000Z",
	          "created_at": null
	        }
	      ]
	    },
	    {
	      "id": 3,
	      "cidade": "cidade3",
	      "coords": {
	        "latitude": 4589674865,
	        "longitude": 774657946
	      },
	      "postos": []
	    }
	  ]
	}
	```
	
##

### Retrieve A Single City


- **Method:** GET
- **Request Body:** Query String.
- **Path:** .../api/cidade/id/*{ID do registro}*
- **Expected data:** Register's id in query string.
- **Respose Body Format**
	
	```
	{
	  "id": 2,
	  "cidade": "cidade2",
	  "coords": {
	    "latitude": 4589674865,
	    "longitude": 774657946
	  },
	  "postos": [
	    {
	      "id": 3,
	      "reservatorio": 58,
	      "coords": {
	        "latitude": 45675,
	        "longitude": 16545
	      },
	      "updated_at": "2022-02-22T03:56:23.000000Z",
	      "created_at": null
	    }
	  ]
	}
	```
	
OBS: I haven't followed the api pattern here in order to respect what the endpoint format asked in the Read me.

##

### Create City


- **Method:** POST
- **Request Body:** Query String | JSON.
- **Path:** .../api/cidade/adicionar/
- **Expected data:**

	```
	{
		"nome_da_cidade" : "Ilinois",
		"latitude" : "4869465",
		"longitude" : "8158131"
	}	

	```
- **Respose Body Format**
	
	```
	{
		"message":"Cidade registrada"
	}
	```

##


### Update City


- **Method:** PUT
- **Request Body:** Query String | JSON.
- **Path:** .../api/cidade/editar/*{ID do registro}*
- **Expected data:**

	```
		{
			"nome_da_cidade" : "Chicago",
			"latitude" : "846451",
			"longitude" : "784564"
		}
	
	```
- **Respose Body Format**
	
	```
	{
	  "message": "Cidade Atualizada"
	}
	```
	
	
##

### Delete City


- **Method:** DELETE
- **Request Body:** Query String.
- **Path:** .../api/cidade/deletar/*{ID do registro}*
- **Expected data:** None.
- **Respose Body Format**
	
	```
		{
			"message":"Cidade deletada com sucesso"
		}
	```
	
	
###