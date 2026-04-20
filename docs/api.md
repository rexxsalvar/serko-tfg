# SERKO API

## Public endpoints

- `GET /api/events`
- `GET /api/events/{id}`
- `GET /api/stadiums`
- `GET /api/stadiums/{id}`

## Authenticated endpoints

Use Sanctum bearer tokens.

- `POST /api/events`
- `PUT /api/events/{id}`
- `DELETE /api/events/{id}`
- `POST /api/stadiums`
- `PUT /api/stadiums/{id}`
- `DELETE /api/stadiums/{id}`
- `GET /api/tickets`
- `GET /api/tickets/{id}`

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
