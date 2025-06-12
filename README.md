<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 📅 Sistema de Gestión de Reservas (En construcción)

Este proyecto es un sistema de gestión de reservas para pymes, freelancers y profesionales independientes. Permite gestionar citas y reservas de manera sencilla con un panel de administración y un calendario integrado.

---

## 🚀 MVP: Producto Mínimo Viable

### 🎯 Funcionalidades del MVP

✅ Autenticación y roles básicos (cliente y administrador).  
✅ CRUD de reservas (crear, leer, actualizar y eliminar).  
✅ Calendario básico (FullCalendar.js).  
✅ Formulario de reserva con validación de fechas y horas.  
✅ Dashboard para administrador con listado de reservas.  
✅ Email de confirmación de reserva al cliente y al administrador.  
✅ Base de datos estructurada (usuarios, reservas, servicios).

---

## 📋 Lista de Tareas del MVP

### 1️⃣ Infraestructura

-   [x] Crear repositorio y estructura de carpetas en Laravel.
-   [x] Configurar base de datos y entorno (.env).
-   [x] Instalar Laravel Breeze o Jetstream para autenticación.

### 2️⃣ Modelado de Datos

-   [x] Crear migraciones y modelos para:
    -   [x] Users (con roles).
    -   [x] Reservations.

### 3️⃣ Lógica de Negocio

-   [x] CRUD de reservas.
-   [x] Validación de fechas y horarios (sin solapamientos).

### 4️⃣ Modelado de Datos y lógica de Negocio (opcional para MVP).

-   [x] Servicios

### 5️⃣ Interfaz de Usuario

-   [x] Dashboard básico para administrador.
-   [x] Formulario de reserva para cliente.
-   [x] Calendario básico con FullCalendar.js.

### 6️⃣ Notificaciones

-   [x] Enviar email de confirmación al cliente y administrador.

### 7️⃣ Front

-   [x] Landing page del producto.
-   [x] Modificar Login y registro
-   [ ] Modificar panel admin y vistas

### 8️⃣ Pruebas

-   [ ] Pruebas básicas de flujo de reservas (manuales o PHPUnit).

### 9️⃣ Documentación

-   [x] README inicial con pasos de despliegue.

---

## 🌱 Funcionalidades Post-MVP

✅ Integración con Stripe para pagos.  
✅ Integración con Google Calendar (OAuth).  
✅ Roles adicionales (staff y permisos granulares).  
✅ Gestión de disponibilidad (turnos y horarios).  
✅ Filtros avanzados en el dashboard (fecha, servicio, estado).  
✅ Notificaciones por SMS (Twilio).  
✅ API RESTful para apps móviles.  
✅ Dashboard de estadísticas (reservas por día, semana, mes).  
✅ Multi-idioma e internacionalización.  
✅ Multi-tenant (varios negocios en la misma app).  
✅ Sistema de suscripciones SaaS (planes de pago).

---

## 🗂️ Roadmap de Versiones

```text
IDEA ──> MVP ──> V1.0 ──> V1.1 ──> V1.2 ──> V2.0

MVP:
  └─ Autenticación
  └─ CRUD Reservas
  └─ Calendario básico
  └─ Emails

V1.0:
  └─ Stripe
  └─ Google Calendar
  └─ Roles Staff

V1.1:
  └─ Disponibilidad
  └─ Filtros avanzados
  └─ Notificaciones SMS

V1.2:
  └─ API RESTful
  └─ Dashboard de estadísticas

V2.0:
  └─ Multi-tenant
  └─ Suscripciones SaaS
  └─ Multi-idioma
```

---

## 🛠️ Tecnologías Usadas

-   Laravel (backend)
-   MySQL (base de datos)
-   Laravel Breeze
-   FullCalendar.js (calendario)
-   TailwindCSS
-   PHPUnit (testing)

### Prerequisites

-   PHP 8.2 o mayor
-   MySQL 8.0 o mayor
-   Composer 2.0 o mayor

---

## 🚀 Cómo empezar

1. Clonar el repositorio
2. Ejecutar `composer install`
3. Copiar el fichero `.env.example` a `.env`
4. Ejecutar `php artisan key:generate`
5. Ejecutar `$ php artisan migrate --seed`
6. Ejecutar `$ php artisan serve`
7. Ejecutar en el navegador `http://127.0.0.1:8000`
8. Iniciar sesión:
    - email: `admin@admin.com`
    - password: `admin`

### Live Demo

[https://reserveo.wpcache.es/](https://reserveo.wpcache.es/) (No disponible aún).

---

## 📫 Contribuciones

¡Las contribuciones son bienvenidas! Si deseas contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz commit (`git commit -m 'Añadir nueva característica'`).
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`).
5. Crea un Pull Request.

---

## 📄 Licencia

This project is open-source.

Gracias por tu interés en contribuir a este proyecto!
