<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Pasos para levantar el  proyecto

## Correr localmente

Ejecute el comando

```bash
  composer install
```

Copie los datos del archivo

```bash
  .env.example
```

Haga un nuevo archivo .env en la raiz de su proyecto y pegue los datos del .env.example en el nuevo .env

```bash
  .env
```

Revise los datos del .env para poder conectarse a una base de datos, revise estos datos y configurelos segun sus credeciales de conexion :

```bash
  DB_CONNECTION=mysql 
  DB_HOST=127.0.0.1 
  DB_PORT=3306 
  DB_DATABASE=laravel 
  DB_USERNAME=root 
  DB_PASSWORD=
```

Corra el comando :

```bash
  php artisan key:generate
```

Luego corra el comando :

```bash
  php artisan migrate
```

Por ultimo levante el servidor con :

```bash
  php artisan serve
```

## Rutas del api Login

- Login : http://127.0.0.1:8000/api/login
- Registro : http://127.0.0.1:8000/api/register
- Perfil de usuario logueado : http://127.0.0.1:8000/api/perfil
- Logout : http://127.0.0.1:8000/api/logout

## Rutas del api Crud

- Get : http://127.0.0.1:8000/api/user
- Post : http://127.0.0.1:8000/api/user
- Put : http://127.0.0.1:8000/api/user/:id
- Delete : http://127.0.0.1:8000/api/user/:id

## Nota

- Las tablas migradas no tienen datos, puede añadir datos en crud de vue js
