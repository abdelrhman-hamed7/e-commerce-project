# AuraTech E-commerce Final Project

Plain PHP 8.2 e-commerce web application using Apache and MySQL.

## Docker Local Test

Create a local environment file from the example, then start the app and database:

```powershell
Copy-Item .env.example .env
docker compose up --build
```

Open these URLs:

- App: http://localhost:8080
- Health check: http://localhost:8080/health

Stop the containers:

```powershell
docker compose down
```

Reset the local MySQL volume and seed data:

```powershell
docker compose down -v
docker compose up --build
```

## Required Environment Variables

The PHP app reads either a MySQL `DATABASE_URL` or the separate variables below:

```text
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=laptop_agency_db
DB_USERNAME=your-mysql-user
DB_PASSWORD=your-mysql-password
DB_CHARSET=utf8mb4
```

For Render, also set:

```text
PORT=10000
```

## Render Deployment

This project uses MySQL-specific SQL features such as `AUTO_INCREMENT` and MySQL `ENUM`, so use MySQL for deployment. Do not use Render PostgreSQL unless you also convert the schema and PHP database behavior to PostgreSQL.

Recommended database options:

- Render private MySQL service with a persistent disk.
- External managed MySQL provider.

After creating the production MySQL database, import `database.sql` into that database.

In the Render dashboard:

1. Create a new Web Service from the GitHub repository.
2. Choose Docker as the runtime.
3. If deploying manually, set the root directory to `E-commerce_final_project_24144-2024`.
4. Use `E-commerce_final_project_24144-2024/Dockerfile` as the Dockerfile path if Render asks for it.
5. Set the health check path to `/health`.
6. Add the required MySQL environment variables.
7. Deploy the service.

The repository also includes a root-level `render.yaml` Blueprint for Docker deployment.
