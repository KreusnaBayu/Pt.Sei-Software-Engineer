## Required
- [Backend] - Jawaban Untuk Nomer 1
- [Frontend] - Jawaban Untuk Nomer 2


## Tech
- [JavaSpringBoot] - evented I/O for the backend
- [CodeIgniter 3] - PHP Framework

## Installation


```sh
mvn install
```

Running The Server....

```sh
mvn spring-boot:run 
```

Running The Web....

```sh
http://localhost/frontend-sei/index.php/proyek
```

## Endpoint

This server uses the REST API model as its endpoint
The server will be up and running on the specified port (by default, it runs on http://localhost:8080). You can configure the port in the .env file.

## PROYEK
| Endpoint | function |
| ------ | ------ |
| GET /proyek| Fetches all resources. |
| GET /proyek/:id | Fetches a single resource by ID. |
| POST /proyek| Creates a new resource.|
|PUT /proyek/:id | Updates an existing resource by ID.|
| DELETE /proyek/:id | Deletes a resource by ID.|

## LOCATION
| Endpoint | function |
| ------ | ------ |
| GET /lokasi| Fetches all resources. |
| GET /lokasi/:id | Fetches a single resource by ID. |
| POST /lokasi| Creates a new resource.|
|PUT /lokasi/:id | Updates an existing resource by ID.|
| DELETE /lokasi/:id | Deletes a resource by ID.|




