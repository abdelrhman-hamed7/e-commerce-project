import os
import pathlib
import sys

import psycopg2


def env_value(name, default=None, required=False):
    value = os.getenv(name, default)
    if required and not value:
        print(f"Missing required environment variable: {name}", file=sys.stderr)
        sys.exit(1)
    return value


sql_path = pathlib.Path(__file__).with_name("database.sql")
sql_text = sql_path.read_text(encoding="utf-8")
database_url = os.getenv("DATABASE_URL")

if database_url:
    connection = psycopg2.connect(database_url)
else:
    connection = psycopg2.connect(
        host=env_value("DB_HOST", "127.0.0.1"),
        port=int(env_value("DB_PORT", "5432")),
        user=env_value("DB_USERNAME", required=True),
        password=env_value("DB_PASSWORD", ""),
        dbname=env_value("DB_DATABASE", required=True),
        sslmode=env_value("DB_SSLMODE"),
    )

try:
    with connection.cursor() as cursor:
        cursor.execute(sql_text)
    connection.commit()
    print("PostgreSQL schema and seed data imported from database.sql")
except Exception:
    connection.rollback()
    raise
finally:
    connection.close()
