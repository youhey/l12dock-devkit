#!/bin/bash -eu

# @see https://github.com/mysql/mysql-docker/blob/mysql-server/5.6/docker-entrypoint.sh

mysql_for_init=( mysql -uroot "-p${MYSQL_ROOT_PASSWORD}" )

if [ -n "$DATABASES" ]; then
    names=(`echo $DATABASES`)

    for (( i = 0; i < ${#names[@]}; ++i )); do
        name=${names[$i]}

        [ "$name" ] && "${mysql_for_init[@]}" <<-EOSQL
            CREATE SCHEMA IF NOT EXISTS \`${name}\` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
            GRANT ALL ON \`${name}\`.* TO '${MYSQL_USER}'@'%' ;
            FLUSH PRIVILEGES;
EOSQL

        echo "DB: ${name}"
    done
fi

echo 'Initialized databases.'
