#!/bin/bash -eu

# @see https://github.com/mysql/mysql-docker/blob/mysql-server/5.6/docker-entrypoint.sh

mysql_for_tz=( mysql -uroot "-p${MYSQL_ROOT_PASSWORD}" )

/usr/bin/mysql_tzinfo_to_sql /usr/share/zoneinfo > /tmp/timezone.sql 2>/dev/null

"${mysql_for_tz[@]}" mysql < /tmp/timezone.sql
echo 'Imported time zone.'

echo "SET GLOBAL time_zone = 'utc';" | "${mysql_for_tz[@]}"
echo "Set time zone utc."
