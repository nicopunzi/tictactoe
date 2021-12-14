# Tic-Tac-Toe

This is a sample REST API application for tic tac toe game 

**Technologies **
- Laravel Framework 5.7.24
- Mysql 

## Installation
* Clone the repository 

* Docker Compose Up

`composer install`

* to migrate the db 

`docker-compose up`
## Sending Requests
You can send POST requests to the URL below using environments like **Postman.** 

**Requests**

| Method | URL            | Header Key    | Header Value     |
| -------|----------------|---------------|----------------- |
| POST   | /api/game/     | Content-Type  | application/json |
| PUT    | api/game/{id}  |               |                  |


**Sample Bodies**
api/newGame

```
{
    "namefirst": "Nicola",
    "namesecond": "Arianna"
}
```

playMove/{game}

```
{
"a1":"X"
}

{
"b1":"O"
}
```

**Sample Responses**

api/newGame

```
{
    "name1": "Nicola",
    "name2": "Arianna",
    "player1": 1,
    "player2": 0,
    "id": 6
}
```

playMove/{game}

```
{
    "id": 6,
    "a1": null,
    "a2": "X",
    "a3": null,
    "b1": null,
    "b2": null,
    "b3": null,
    "c1": null,
    "c2": null,
    "c3": null,
    "player1": 0,
    "player2": 1,
    "name1": "Nicola",
    "name2": "Arianna",
    "game_status": null,
    "winner": null
}

{
    "id": 6,
    "a1": null,
    "a2": "X",
    "a3": null,
    "b1": null,
    "b2": "O",
    "b3": null,
    "c1": null,
    "c2": "X",
    "c3": "O",
    "player1": 1,
    "player2": 0,
    "name1": "Nicola",
    "name2": "Arianna",
    "game_status": null,
    "winner": null
}
```