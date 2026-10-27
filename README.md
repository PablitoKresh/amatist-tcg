# 🃏 Amatist TCG

Tienda online de cartas coleccionables (Magic, Pokémon, Yu-Gi-Oh!) desarrollada con **Laravel**.
Proyecto en equipo para la asignatura *Tecnologías Avanzadas de Desarrollo* (Grado en Ingeniería Informática en Sistemas de Información, Universidad Pablo de Olavide, curso 2025/2026).

👉 **Demo:** [amatist-tcg-demo.onrender.com](https://amatist-tcg-demo.onrender.com)
(servidor gratuito: si lleva un rato sin visitas, la primera carga tarda unos segundos; las cuentas de prueba aparecen en el login)

---

## ✨ Funcionalidades

**Clientes**
- Registro, inicio de sesión y perfil de usuario (con avatar), gestionados con Laravel Fortify.
- Catálogo de productos por categorías y lista de favoritos.
- Compra de productos y consulta de pedidos en *Mis pedidos*.
- Correo electrónico en cada cambio de estado del pedido: confirmado, preparando, enviado, entregado o cancelado.

**Administración**
- Panel protegido por roles mediante middleware.
- Gestión de productos (incluido stock) y de pedidos, con cambio de estado.
- Estadísticas de productos favoritos.

**General**
- Interfaz en español e inglés.

## 🗄️ Base de datos

Modelo relacional en MySQL construido con migraciones y *seeders*:

- `users` (con rol y campos de perfil)
- `products`, `category` y la tabla pivote `category_product` (relación N:M)
- `orders` y `order_items`
- `product_user_favorites` (relación N:M entre usuarios y productos)

El diagrama UML está en [`docs/uml.svg`](docs/uml.svg) y la memoria del proyecto en [`docs/memoria.docx`](docs/memoria.docx).

## 🛠️ Tecnologías

- PHP 8 · Laravel 9 · Laravel Fortify
- MySQL
- Bootstrap 5
- MailHog (correo en local)

## 🚀 Puesta en marcha

```bash
git clone https://github.com/PablitoKresh/amatist-tcg.git
cd amatist-tcg
composer install
cp .env.example .env
php artisan key:generate
```

Configura la base de datos en `.env` (`DB_DATABASE=amatist_tcg`, usuario y contraseña) y créala vacía:

```sql
CREATE DATABASE amatist_tcg CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Después:

```bash
php artisan migrate --seed
php artisan serve
```

La aplicación queda en `http://127.0.0.1:8000`.

**Usuario administrador:** registra un usuario y cambia su rol en la base de datos:

```sql
UPDATE users SET role = 'admin' WHERE email = 'tu@email.com';
```

## 👥 Equipo

- Pablo Jiménez Bertolet — [@PablitoKresh](https://github.com/PablitoKresh)
- Antonio Peralias Alfonso — [@antoniop3011](https://github.com/antoniop3011)
- Jairo Rodríguez Hernández — [@Jairodher](https://github.com/Jairodher)

La documentación original de la entrega está en [`README.txt`](README.txt).
