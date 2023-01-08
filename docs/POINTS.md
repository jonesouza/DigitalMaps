# Points

## Validators

`x` -> deve ser maior que 0
`y` -> deve ser maior que 0

## Endpoints

### Listar todos os pontos

**Request:**

`GET /api/points`

**Response** `200`

``` json
[
	{
		"id": 9,
		"name": "Shopping",
		"x": 1580,
		"y": 785,
		"opened_at": "11:00:00",
		"closed_at": "23:00:00",
		"created_at": "2023-01-07T21:44:38.000000Z",
		"updated_at": "2023-01-07T21:44:38.000000Z"
	},
]
```

### Listar todos os pontos próximos

**Request:**

`GET /api/points/near`

**Parameters:** 

``` json
{
	"x": 1580,
	"y": 785,
	"distance: "10",
	"hour": "11:00:00",
}
```

### Recuperar um ponto

**Request:**

`GET /api/points/123`

**Response:** `200`

``` json
{
	"id": 123,
	"name": "Shopping",
	"x": 1580,
	"y": 785,
	"opened_at": "11:00:00",
	"closed_at": "23:00:00",
	"created_at": "2023-01-07T21:44:38.000000Z",
	"updated_at": "2023-01-07T21:44:38.000000Z"
},
```

### Criar um ponto

**Request:**

`POST /api/points`

**Parameters:**

``` json
{
	"name": "Shopping",
	"x": 1580,
	"y": 785,
	"opened_at": "11:00",
	"closed_at": "23:00",
}
```

**Response:** `201`

``` json
{
	"id": 9,
	"name": "Shopping",
	"x": 1580,
	"y": 785,
	"opened_at": "11:00:00",
	"closed_at": "23:00:00",
	"created_at": "2023-01-07T21:44:38.000000Z",
	"updated_at": "2023-01-07T21:44:38.000000Z"
}
```

### Atualizar um ponto

**Request:**

`PUT /api/points/9`

**Parameters:**

``` json
{
	"name": "Shopping",
	"x": 1580,
	"y": 785,
	"opened_at": "11:00",
	"closed_at": "23:00",
}
```

**Response:** `200`

``` json
{
	"id": 9,
	"name": "Shopping",
	"x": 1580,
	"y": 785,
	"opened_at": "11:00:00",
	"closed_at": "23:00:00",
	"created_at": "2023-01-07T21:44:38.000000Z",
	"updated_at": "2023-01-07T21:44:38.000000Z"
}
```

### Recuperar um ponto

**Request:**

`DELETE /api/points/123`

**Response:** `204`

``` json

```