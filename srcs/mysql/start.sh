#!/bin/sh
rc default
/etc/init.d/mariadb setup
rc-service mariadb start
mysql < /tmp/setup.sql && mysql -u root wordpress < /tmp/wp.sql
rc-service mariadb stop
/usr/bin/mysqld_safe