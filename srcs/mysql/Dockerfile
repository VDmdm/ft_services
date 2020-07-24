FROM alpine:latest

#install mysql (mariadb)
RUN apk update && apk upgrade
RUN apk add mysql mysql-client
RUN apk add openrc

VOLUME [ "/sys/fs/cgroup" ]
VOLUME [ "/var/lib/mysql" ]

#copy configs
COPY ./start.sh /tmp/start.sh
COPY ./configs/setup.sql /tmp/setup.sql
COPY ./configs/wordpress.sql /tmp/wp.sql
COPY ./configs/my.cnf /etc/mysql/my.cnf

#setup mysql
RUN chmod 744 /etc/mysql/my.cnf
RUN chmod +x /tmp/start.sh

#start
EXPOSE 3306
RUN chmod +x /tmp/start.sh
ENTRYPOINT [ "/tmp/start.sh" ]