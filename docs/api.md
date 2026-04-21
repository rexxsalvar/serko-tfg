# SERKO API

## Public endpoints

- `GET /api/events`
- `GET /api/events/{id}`
- `GET /api/stadiums`
- `GET /api/stadiums/{id}`
- `GET /api/teams`
- `GET /api/teams/{id}`
- `GET /api/competitions`
- `GET /api/competitions/{id}`
- `GET /api/sectors`
- `GET /api/sectors/{id}`

## Authentication

- `POST /api/tokens` creates a Sanctum bearer token from `email`, `password` and optional `device_name`
- `DELETE /api/tokens/current` revokes the current token

## Authenticated endpoints

Use `Authorization: Bearer <token>`.

- `POST /api/events`
- `PUT /api/events/{id}`
- `DELETE /api/events/{id}`
- `POST /api/stadiums`
- `PUT /api/stadiums/{id}`
- `DELETE /api/stadiums/{id}`
- `POST /api/teams`
- `PUT /api/teams/{id}`
- `DELETE /api/teams/{id}`
- `POST /api/competitions`
- `PUT /api/competitions/{id}`
- `DELETE /api/competitions/{id}`
- `POST /api/sectors`
- `PUT /api/sectors/{id}`
- `DELETE /api/sectors/{id}`
- `GET /api/orders`
- `GET /api/orders/{id}`
- `GET /api/payments`
- `GET /api/payments/{id}`
- `PUT /api/payments/{id}`
- `GET /api/tickets`
- `GET /api/tickets/{id}`

## Authorization matrix

| Resource | Public read | Create | Update | Delete |
| --- | --- | --- | --- | --- |
| Events | Yes | Admin | Admin | Admin |
| Stadiums | Yes | Admin | Admin | Admin |
| Teams | Yes | Admin, Manager | Admin, Manager | Admin |
| Competitions | Yes | Admin, Manager | Admin, Manager | Admin |
| Sectors | Yes | Admin, Manager, Support | Admin, Manager, Support | Admin, Manager |
| Orders | No | System checkout | System/Admin flow | Owner/Admin read |
| Payments | No | System checkout | Admin, Manager | Owner/Admin read |
| Tickets | No | System checkout | Owner/Admin read | Soft delete by system/Admin |

All authenticated write endpoints require a Sanctum token in the `Authorization: Bearer <token>` header. Validation errors return HTTP `422` with Laravel's standard `message` and `errors` payload; forbidden actions return `403`.

## Token payload

```json
{
  "email": "admin@serko.test",
  "password": "password",
  "device_name": "phpstorm"
}
```

Successful response:

```json
{
  "data": {
    "token": "1|plain-text-token",
    "user": {
      "id": 1,
      "name": "SERKO Admin",
      "email": "admin@serko.test",
      "role": "Admin"
    }
  }
}
```

## Example event payload

```json
{
  "stadium_id": 1,
  "competition_id": 1,
  "home_team_id": 1,
  "away_team_id": 2,
  "date": "2026-05-02 21:00:00",
  "description": "<p>Clasico de liga.</p>",
  "seats": [
    {
      "seat_id": 10,
      "price": 49.99,
      "status": "available"
    }
  ]
}
```

## Example team payload

```json
{
  "name": "Real Madrid",
  "logo": "teams/real-madrid.svg"
}
```

## Example competition payload

```json
{
  "name": "Champions League"
}
```

## Example sector payload

```json
{
  "stadium_id": 1,
  "name": "North Stand",
  "type": "vip"
}
```

## Response shape

Collection endpoints return paginated JSON resources:

```json
{
  "data": [],
  "links": {},
  "meta": {}
}
```

Single-resource endpoints return:

```json
{
  "data": {
    "id": 1
  }
}
```
