<h1>Installation</h1>
<p>To clone and run this locally do the following:</p>
<p>git clone git@github.com:DR33M/laravel-pastebin-project.git</p>
<p>cd laravel-pastebin-project</p>
<p>cp .env.example .env</p>
<p>run <code>composer install</code></p>
<p>Create a database on the server and fill in the fields of the .env file located in the project folder as follows:</p>


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=null
```

<p>Run the database migrations <code>php artisan migrate --seed</code></p>
<p>Create the symbolic links <code>php artisan storage:link</code></p>
<p>Start the local development server <code>php artisan serve</code>
<p>try <code>http://localhost:8000</code> on your browser</p>
