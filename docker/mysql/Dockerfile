FROM mysql:8.0.43

ADD ./custom.cnf /etc/mysql/conf.d/
ADD ./.my.cnf /root/

COPY 001_init.sh /docker-entrypoint-initdb.d/
COPY 002_timezone.sh /docker-entrypoint-initdb.d/

ENV LANG="C.UTF-8"
ENV LC_ALL="C.UTF-8"
ENV TZ="UTC"
