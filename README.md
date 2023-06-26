# Application documentation

## Setup instructions

#### Run application

```
docker-compose up -d
```

#### Stop application

```
docker-compose down
```

#### Install backed dependencies

```
docker compose exec jobs_app bash composer install 
```

#### Populate the project with data

```
docker compose exec jobs_app php artisan migrate --seed
```

#### Compile front end

```
npm install && npm run production
```

## Web access

#### Index (lists all jobs paginated 2 per page)

```
http GET http://jobs.local/jobs
```

#### Get

```
http GET http://jobs.local/jobs/ID
```

#### Create

```
http POST http://jobs.local/jobs [data]
```

## API endpoints

#### Index (lists all jobs paginated 2 per page)

```
http GET http://jobs.local/api/jobs
```

#### Get

```
http GET http://jobs.local/api/jobs/ID
```

#### Create

```
http POST http://jobs.local/api/jobs [data]
```

#### Update

```
http PUT http://jobs.local/api/jobs/ID [data]
```

#### Delete

```
http DELETE http://jobs.local/api/jobs/ID
```

## Tests

#### Execute tests

```
docker compose exec jobs_app php artisan test
```
