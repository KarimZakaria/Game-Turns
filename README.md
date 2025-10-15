# Game Turns Gerneration Endpoint

Laravel API endpoint that generates player turns dynamically with starting from any player.

## Features
- Custom validation using FormRequest
- Service-based architecture
- API Resource formatting with status wrapper
- Fully JSON-based responses using Trait

## Example API Request
GET /api/game-turns?players=3&turns=2&start=A

## Example Response
```json
{
  "status": "success",
  "data": {
    "turns": [
      { "turn_number": 1, "players": ["A", "B", "C"] },
      { "turn_number": 2, "players": ["B", "C", "A"] },
    ]
  }
}
