import os
import pathlib
import sys

import pymysql


def env_value(name, default=None, required=False):
    value = os.getenv(name, default)
    if required and not value:
        print(f"Missing required environment variable: {name}", file=sys.stderr)
        sys.exit(1)
    return value


sql_path = pathlib.Path(__file__).with_name("database.sql")
sql_text = sql_path.read_text(encoding="utf-8")

connection = pymysql.connect(
    host=env_value("DB_HOST", "127.0.0.1"),
    port=int(env_value("DB_PORT", "3306")),
    user=env_value("DB_USERNAME", required=True),
    password=env_value("DB_PASSWORD", ""),
    database=env_value("DB_DATABASE", required=True),
    autocommit=False,
)

try:
    with connection.cursor() as cursor:
        for statement in sql_text.split(";"):
            statement = statement.strip()
            if statement:
                cursor.execute(statement)
    connection.commit()
    print("MySQL schema and seed data imported from database.sql")
except Exception:
    connection.rollback()
    raise
finally:
    connection.close()
