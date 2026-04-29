========================================================
  AMATIST TCG  ·  Proyecto e-commerce
  Tecnologias Avanzadas de Desarrollo
  Grado en Ingenieria Informatica en Sistemas de Informacion
  Curso 2025/2026
  Entrega: Problema 2  (version 1.0)
========================================================


INTEGRANTES DEL GRUPO
---------------------
  - Pablo Jimenez Bertolet            (GitHub: PablitoKresh)
  - Antonio Peralias Alfonso          (GitHub: antoniop3011)
  - Jairo Rodriguez Hernández         (GitHub: Jairodher)


REPOSITORIO Y GESTION
---------------------
  - Repositorio:    https://github.com/PablitoKresh/amatist-tcg
  - Release:        v1.0
  - Tablero Kanban: [PEGAR URL DEL PROJECT DE GITHUB]


DOCUMENTACION DE LA ENTREGA
---------------------------
  - Memoria del proyecto:    docs/memoria.docx
  - Diagrama UML de la BD:   docs/uml.svg


PILA TECNOLOGICA
----------------
  - PHP 8 + Laravel 9
  - MySQL
  - Bootstrap 5 (via CDN)
  - Laravel Fortify (autenticacion)
  - MailHog (correo electronico en entorno local)


PUESTA EN MARCHA
----------------
  1. Clonar el repositorio.
  2. composer install
  3. cp .env.example .env  (o copiar a mano en Windows)
  4. Configurar en .env:
       DB_DATABASE=amatist_tcg
       DB_USERNAME=root
       DB_PASSWORD=
  5. php artisan key:generate
  6. Crear la base de datos vacia en MySQL:
       CREATE DATABASE amatist_tcg CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
  7. php artisan migrate --seed
  8. Arrancar Apache desde Laragon  (o ejecutar `php artisan serve`).

  URL de la aplicacion:
       - Con Laragon:        http://amatist-tcg.test
       - Con artisan serve:  http://127.0.0.1:8000


USUARIO ADMINISTRADOR
---------------------
  Para acceder al panel de administracion:
    1. Registrar un usuario desde /register.
    2. En la base de datos, cambiar el campo `role` del usuario a `admin`:
         UPDATE users SET role = 'admin' WHERE email = 'tu@email.com';
    3. Volver a iniciar sesion para que se aplique el rol.


CASO DE USO PRINCIPAL  (Problema 2 v1.0)
----------------------------------------
  Comprar un producto:
    /catalogo  ->  click en "Anadir"  ->  login si procede
    ->  se crea el pedido en estado pendiente
    ->  se envia correo de confirmacion al cliente
    ->  el pedido aparece en /mis-pedidos
    ->  el admin puede consultarlo y cambiar su estado en /admin
