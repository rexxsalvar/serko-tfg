# SERKO

SERKO es una plataforma Laravel para venta y gestion de entradas deportivas. Incluye zona publica, checkout con selector de asientos, tickets con QR, panel admin, reportes Excel, API REST con Sanctum y datos demo.

## Arranque rapido

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed
npm run build
php artisan serve --host=127.0.0.1 --port=8080
```

En Windows con Herd, si `php artisan serve` falla, usa la ruta completa:

```powershell
& 'C:\Users\locur\.config\herd\bin\php84\php.exe' artisan serve --host=127.0.0.1 --port=8080
```

Abre `http://localhost:8080`.

## Credenciales demo

- Admin: `admin@serko.test`
- Usuario: `user@serko.test`
- Password: `password`

## Funcionalidades principales

- Home premium con eventos destacados y estadisticas.
- Listado y detalle de eventos y estadios.
- Registro, login, logout y roles `Admin` / `User`.
- Checkout protegido con seleccion visual de asientos.
- Validacion de disponibilidad real por evento y transaccion de compra.
- Pedido, pago PayPal mock/realista, tickets con QR y confirmacion.
- Dashboard de usuario, historial de pedidos y tickets.
- Admin CRUD de eventos y estadios, subida de imagen y editor enriquecido.
- Reportes Excel de ventas y eventos.
- API REST con recursos JSON y tokens Sanctum.
- Traducciones ES/EN con selector en la navegacion.

## API

La documentacion de endpoints esta en `docs/api.md`.

Para obtener token:

```bash
curl -X POST http://localhost:8080/api/tokens ^
  -H "Accept: application/json" ^
  -H "Content-Type: application/json" ^
  -d "{\"email\":\"admin@serko.test\",\"password\":\"password\",\"device_name\":\"demo\"}"
```

## Calidad

```bash
php artisan test
npm run build
```

El checkout usa transacciones y valida que los asientos sigan disponibles antes de emitir tickets.
