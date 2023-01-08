#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS digitalmaps;
    GRANT ALL PRIVILEGES ON \`digitalmaps%\`.* TO '$MYSQL_USER'@'%';
EOSQL