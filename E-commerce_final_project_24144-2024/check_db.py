import os
import sys

import psycopg2
import psycopg2.extras


def env_value(name, default=None, required=False):
    value = os.getenv(name, default)
    if required and not value:
        print(f"Missing required environment variable: {name}", file=sys.stderr)
        sys.exit(1)
    return value


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
    with connection.cursor(cursor_factory=psycopg2.extras.DictCursor) as cursor:
        cursor.execute("""
            SELECT table_name
            FROM information_schema.tables
            WHERE table_schema = 'public'
            ORDER BY table_name;
        """)
        tables = cursor.fetchall()

        print("PostgreSQL connection OK")
        print("Tables:")
        for table in tables:
            print("-", table["table_name"])

        cursor.execute("SELECT name, price, stock_quantity FROM products LIMIT 5;")
        rows = cursor.fetchall()

        print("\nSample products:")
        for row in rows:
            print(f"- {row['name']} | ${row['price']} | Stock: {row['stock_quantity']}")
finally:
    connection.close()
