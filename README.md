# SnippetGarden API


REST API application that provide CRUD endpoints to helpful snippets for laravel development

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Set Environment

```
    $ cp .env.example .env
```

## Set the application key

```
   $ php artisan key:generate
```

## Run migrations and seeds

```
   $ php artisan migrate --seed
```

## Getting with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://localhost/api/snippets
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://localhost/api/snippets/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d '{"name":"Foo bar","code":"Snippet code goes here"}' http://localhost/api/snippets
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X PUT -d '{"name":"Foo bar","code":"Snippet code goes here"}' http://localhost/api/snippets/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X DELETE http://localhost/api/snippets/:id
```

## Pagination with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://localhost/api/snippets?page=:number_page 
```

## Run App in container Docker with Laravel Sail

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

## Run Start Application with Laravel Sail
```
  ./vendor/bin/sail up
```
