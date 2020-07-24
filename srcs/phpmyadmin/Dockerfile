FROM alpine:latest

#install php + ligthttpd
RUN apk update && apk upgrade
RUN apk add openrc
RUN rc default
RUN apk add lighttpd php7-session php7-common php7-mbstring 	\
	php7-iconv php7-json php7-gd php7-curl php7-xml php7-mysqli \
	php7-imap php7-cgi fcgi php7-pdo php7-pdo_mysql php7-soap 	\
	php7-xmlrpc php7-posix php7-mcrypt php7-gettext php7-ldap 	\
	php7-ctype php7-dom

VOLUME [ "/sys/fs/cgroup" ]

#copy config file
COPY ./start.sh /tmp/
COPY ./configs/lighttpd.conf /etc/lighttpd/lighttpd.conf
COPY ./configs/mod_fastcgi.conf /etc/lighttpd/mod_fastcgi.conf

#setup server
RUN rc-service lighttpd restart
RUN adduser -u 2000 -G www-data -s /bin/sh -D www-data

#install & setup pma
WORKDIR /var/www/localhost/htdocs/
RUN wget http://files.directadmin.com/services/all/phpMyAdmin/phpMyAdmin-5.0.2-all-languages.tar.gz
RUN tar zxvf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN mv phpMyAdmin-5.0.2-all-languages/* ./
RUN rm -rf phpMyAdmin-5.0.2-all-languages.tar.gz phpMyAdmin-5.0.2-all-languages
COPY ./configs/config.inc.php /var/www/localhost/htdocs/config.inc.php
RUN chmod -R 755 /var/www/localhost/htdocs/
RUN mkdir tmp/ && chmod 777 tmp/

#start
WORKDIR /etc/lighttpd/
EXPOSE 5000
#RUN chmod +x /tmp/start.sh
ENTRYPOINT [ "lighttpd", "-f", "lighttpd.conf", "-D" ]