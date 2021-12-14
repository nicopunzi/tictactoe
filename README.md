# TicTacToe

This is a sample REST API application for tic tac toe game 

**Technologies **
- Laravel
- Mysql 

## Sending Requests
You can send requests to the URL below using environments like **Postman.** 

**Requests**

| Method | URL                  | Header Key    | Header Value     |
| -------|----------------------|---------------|----------------- |
| POST   | /api/newGame         | Content-Type  | application/json |
| PUT    | api/playMove/{game}  |               |                  |


**Sample Bodies**
api/newGame

```
{
    "namefirst": "Nicola",
    "namesecond": "Arianna"
}
```

playMove/{game}

scheme blocks
 --------------
| a1 | a2 | a3 | 

| b1 | b2 | b3 |   

| c1 | c2 | c3 |  
 --------------

1 and 2 represents the player1 and player2

```
{
"a1":"1"
}

{
"b1":"2"
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
    "a2": "1",
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
    "a2": "1",
    "a3": null,
    "b1": null,
    "b2": "2",
    "b3": "1",
    "c1": null,
    "c2": "X",
    "c3": "2",
    "player1": 1,
    "player2": 0,
    "name1": "Nicola",
    "name2": "Arianna",
    "game_status": null,
    "winner": null
}
```
