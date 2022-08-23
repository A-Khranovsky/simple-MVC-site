## Vocation
Praction with MVC, factroy, decorator patterns, caching with Redis, generators.

## Description
Project is a simple site wtih three pages. Pages has title, content, page bar. Page bar enables
to switch to pervious or next page.
Data about title and content is stored in MVC\Models\Pages, it is an array of objects.
Routers parses the url and takes data for creation objects of decorators and views using factory.

## How to run
* Clone the project.
* Run:
```angular2html
docker-compose up -d
```
* visit: http://localhost

### Some output example:
