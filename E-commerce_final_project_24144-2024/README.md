# AuraTech E-commerce Final Project

Plain PHP 8.2 e-commerce web application using Apache and PostgreSQL.

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

Reset the local PostgreSQL volume and seed data:

```powershell
docker compose down -v
docker compose up --build
```

## Required Environment Variables

On Render, the easiest setup is to use the included `render.yaml` Blueprint. It creates a free Render PostgreSQL database and passes its connection string to the web service as `DATABASE_URL`.

The app reads either `DATABASE_URL` or the separate PostgreSQL variables below:

```text
DATABASE_URL=postgresql://user:password@host:5432/laptop_agency_db
```

or:

```text
DB_HOST=your-postgres-host
DB_PORT=5432
DB_DATABASE=laptop_agency_db
DB_USERNAME=your-postgres-user
DB_PASSWORD=your-postgres-password
DB_SSLMODE=require
AUTO_INIT_DB=true
```

For Render, also set:

```text
PORT=10000
```

## Render Deployment

This project is configured for Render using Docker and Render PostgreSQL.

Recommended no-card path:

1. Push the latest code to GitHub.
2. In Render, create a new Blueprint from this repository.
3. Keep the Blueprint path as `render.yaml`.
4. Render will create:
   - Docker web service: `auratech-ecommerce`
   - Free PostgreSQL database: `auratech-postgres`
5. Deploy the Blueprint.

The app has `AUTO_INIT_DB=true`, so it creates the PostgreSQL tables and seed products the first time it connects.

Manual web service settings, if you are not using Blueprint:

1. Create a free Render PostgreSQL database.
2. Create a new Web Service from the GitHub repository.
3. Choose Docker as the runtime.
4. Leave root directory empty.
5. Set Dockerfile path to `E-commerce_final_project_24144-2024/Dockerfile`.
6. Set Docker context to `E-commerce_final_project_24144-2024`.
7. Set the health check path to `/health`.
8. Add `DATABASE_URL` from the Render PostgreSQL database.
9. Add `AUTO_INIT_DB=true`.
10. Deploy the service.
