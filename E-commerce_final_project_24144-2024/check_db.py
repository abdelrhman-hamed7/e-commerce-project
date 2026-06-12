import os
import sys

import pymysql


def env_value(name, default=None, required=False):
    value = os.getenv(name, default)
    if required and not value:
        print(f"Missing required environment variable: {name}", file=sys.stderr)
        sys.exit(1)
    return value


connection = pymysql.connect(
    host=env_value("DB_HOST", "127.0.0.1"),
    port=int(env_value("DB_PORT", "3306")),
    user=env_value("DB_USERNAME", required=True),
    password=env_value("DB_PASSWORD", ""),
    database=env_value("DB_DATABASE", required=True),
    cursorclass=pymysql.cursors.DictCursor,
)

try:
    with connection.cursor() as cursor:
        cursor.execute("SHOW TABLES;")
        tables = cursor.fetchall()

        print("MySQL connection OK")
        print("Tables:")
        for table in tables:
            print("-", next(iter(table.values())))

        cursor.execute("SELECT name, price, stock_quantity FROM products LIMIT 5;")
        rows = cursor.fetchall()

        print("\nSample products:")
        for row in rows:
            print(f"- {row['name']} | ${row['price']} | Stock: {row['stock_quantity']}")
finally:
    connection.close()
