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
- [X] Crear repositorio y estructura de carpetas en Laravel.
- [X] Configurar base de datos y entorno (.env).
- [X] Instalar Laravel Breeze o Jetstream para autenticación.

### 2️⃣ Modelado de Datos
- [ ] Crear migraciones y modelos para:
  - [X] Users (con roles).
  - [ ] Reservations.
  - [ ] Services (opcional para MVP).

### 3️⃣ Lógica de Negocio
- [ ] CRUD de reservas.
- [ ] Validación de fechas y horarios (sin solapamientos).

### 4️⃣ Interfaz de Usuario
- [ ] Dashboard básico para administrador.
- [ ] Formulario de reserva para cliente.
- [ ] Calendario básico con FullCalendar.js.

### 5️⃣ Notificaciones
- [ ] Enviar email de confirmación al cliente y administrador.

### 6️⃣ Pruebas
- [ ] Pruebas básicas de flujo de reservas (manuales o PHPUnit).

### 7️⃣ Documentación
- [ ] README inicial con pasos de despliegue.

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

- Laravel (backend)
- MySQL (base de datos)
- Laravel Breeze o Jetstream (autenticación)
- FullCalendar.js (calendario)
- TailwindCSS (opcional para el frontend)
- PHPUnit (testing)

---

## 🚀 Cómo empezar

```bash
git clone https://github.com/raortega8906/reserveo.git
cd gestion-reservas-laravel
composer install
cp .env.example .env
php artisan key:generate
# Configura la base de datos en .env
php artisan migrate
php artisan serve
```
¡Listo! Accede a http://localhost:8000.

## 📫 Contribuciones

¡Las contribuciones son bienvenidas! Si deseas contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz commit (`git commit -m 'Añadir nueva característica'`).
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`).
5. Crea un Pull Request.

## 📄 Licencia

Este proyecto está licenciado bajo la licencia [MIT](https://opensource.org/licenses/MIT). Puedes ver el archivo de licencia completo en [LICENSE](LICENSE).

Gracias por tu interés en contribuir a este proyecto!