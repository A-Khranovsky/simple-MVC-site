## Vocation
Praction with MVC, factroy, decorator patterns, caching with Redis, generators.

## Description
Project is a simple site wtih three pages. Pages has title, content, page bar. Page bar enables
to switch to pervious or next page.
Data about title and content is stored in MVC\Models\Pages, it is an array of objects.
Routers parses the url and takes data for creation objects of decorators and views using factory.
MVC\Views\HtmlView uses generators for getting data from decorator on purpose to simplify the project.
Befor the output the view to browser, it is checked if the cache of this view exists in redis, using the url as
the key of value in redis. If it is not exist project creates the cache. If cache exists project returns it.
Environment, wich was made by docker, specialy tunes apache server for using the url with MVC pattern.

## How to run
* Clone the project.
* Run:
```angular2html
docker-compose up -d
```
```angular2html
docker exec -it 45_php-apache_1 bash
```
In first build:
```angular2html
composer update
```
```angular2html
service redis-server restart
```
* visit: http://localhost/pages.html?page=1

### Some output example (example of cache):
```
127.0.0.1:6379> keys *
1) "/pages.html?page=1"
2) "/pages.html?page=2"
3) "/pages.html?page=3"
127.0.0.1:6379> get /pages.html?page=1
"<!DOCTYPE html>\n<html lang=\"ru\">\n<head>\n\t<title>Title1</title>\n\t<meta charset=\"utf-8\">\n</head>\n<body>\n\t<h1>Title1</h1><p>Content1</p>\n\t
<br />\n\t        <a href=\"?page=1\"><-</a>&nbsp&nbsp<a href=\"?page=2\">-></a>\t\t\t\t\n</body>\n</html>"
127.0.0.1:6379>
```

