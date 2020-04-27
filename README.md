
# Studee Code Challenge

## How to run the API

The api was developed in a Laradock (https://laradock.io/) docker development environment.

e.g. 
    `docker-compose up -d nginx mysql`

set up for multiple projects (https://laradock.io/getting-started/#B)

the hosts file (`/private/etc/host` on a mac) should contain an entry for the test development site

e.g.
    `127.0.0.1	studee-api.test`

and the nginx config file (`nginx/sites/studee-api.conf`) in whereever Laradock is instelled, will need to look something like this,

```
server {

    listen 80;
    listen [::]:80;

    # For https
    # listen 443 ssl;
    # listen [::]:443 ssl ipv6only=on;
    # ssl_certificate /etc/nginx/ssl/default.crt;
    # ssl_certificate_key /etc/nginx/ssl/default.key;

    server_name studee-api.test;
    root /var/www/studee-api/public;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

    error_log /var/log/nginx/studee-api_error.log;
    access_log /var/log/nginx/studee-api_access.log;
}

```

## Endpoints created

Ideally the endpoints will by documented in something like swagger but here is a list of the routes implemented (via Laravel's artisan command line tool)

```
+--------+-----------+---------------------------+------------------+--------------------------------------------------+--------------+
| Domain | Method    | URI                       | Name             | Action                                           | Middleware   |
+--------+-----------+---------------------------+------------------+--------------------------------------------------+--------------+
|        | GET|HEAD  | /                         |                  | Closure                                          | web          |
|        | POST      | api/class                 | class.store      | App\Http\Controllers\CclassController@store      | api          |
|        | GET|HEAD  | api/class                 | class.index      | App\Http\Controllers\CclassController@index      | api          |
|        | GET|HEAD  | api/class/{class}         | class.show       | App\Http\Controllers\CclassController@show       | api          |
|        | PUT|PATCH | api/class/{class}         | class.update     | App\Http\Controllers\CclassController@update     | api          |
|        | DELETE    | api/class{class}          |                  | App\Http\Controllers\CclassController@destroy    | api          |
|        | GET|HEAD  | api/commodity             | commodity.index  | App\Http\Controllers\CommodityController@index   | api          |
|        | POST      | api/commodity             | commodity.store  | App\Http\Controllers\CommodityController@store   | api          |
|        | GET|HEAD  | api/commodity/{commodity} | commodity.show   | App\Http\Controllers\CommodityController@show    | api          |
|        | DELETE    | api/commodity/{commodity} |                  | App\Http\Controllers\CommodityController@destroy | api          |
|        | PUT|PATCH | api/commodity/{commodity} | commodity.update | App\Http\Controllers\CommodityController@update  | api          |
|        | GET|HEAD  | api/family                | family.index     | App\Http\Controllers\FamilyController@index      | api          |
|        | POST      | api/family                | family.store     | App\Http\Controllers\FamilyController@store      | api          |
|        | GET|HEAD  | api/family/{family}       | family.show      | App\Http\Controllers\FamilyController@show       | api          |
|        | PUT|PATCH | api/family/{family}       | family.update    | App\Http\Controllers\FamilyController@update     | api          |
|        | DELETE    | api/family{family}        |                  | App\Http\Controllers\FamilyController@destroy    | api          |
|        | POST      | api/segment               | segment.store    | App\Http\Controllers\SegmentController@store     | api          |
|        | GET|HEAD  | api/segment               | segment.index    | App\Http\Controllers\SegmentController@index     | api          |
|        | GET|HEAD  | api/segment/{segment}     | segment.show     | App\Http\Controllers\SegmentController@show      | api          |
|        | PUT       | api/segment/{segment}     |                  | App\Http\Controllers\SegmentController@update    | api          |
|        | DELETE    | api/segment/{segment}     |                  | App\Http\Controllers\SegmentController@destroy   | api          |
|        | GET|HEAD  | api/user                  |                  | Closure                                          | api,auth:api |
+--------+-----------+---------------------------+------------------+--------------------------------------------------+--------------+
```

Please note that `PUT` and `DELETE` endpoints have only been created for segments due to time constraints but in a full solution they would be implemented for the other aspects of the data too (but with any extra required logic required to coordinate the numbering).

## Unit Tests

There are 16 unit tests and they are located in `tests/unit/StudeeApiUnitTest.php`

## Assumptions made

The main assumption made was that all the data would need to be updateable, hence the different aspects of the data was separated out into separate tables (i.e. segments, families, classes & commodities).

A complete solution would also incorporate authentication (not implemented) to protect the relevant endpoints and various fields in the db tables would have indices added, made unique and linked to each other as foriegn keys (with cascaded deletes if required)

It's envisioned that there would be need of logic to create new segment, family, etc, numbers based on these not being ones already in use.

# Api schema

Supplied by other means
