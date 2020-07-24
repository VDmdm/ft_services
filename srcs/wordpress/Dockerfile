FROM alpine:latest

#install php + nginx
RUN apk update && apk upgrade
RUN apk add openrc
RUN apk add nginx supervisor
RUN apk add php7-fpm php7-mysqli php7-curl php7-gd			\
	php7-intl php7-mbstring php7-soap php7-xml php7-xmlrpc	\
	php7-zip php7-json php7-mbstring

VOLUME [ "/sys/fs/cgroup" ]

#add user and dir for nginx
RUN adduser -u 2000 -G www-data -s /bin/sh -D www-data
RUN mkdir -p /var/www/localhost/

#copy configs
COPY ./start.sh /tmp/
COPY ./configs/nginx-wp /etc/nginx/conf.d/default.conf
COPY ./configs/www.conf /etc/php7/php-fpm.d/www.conf
COPY ./configs/supervisor.conf /etc/supervisord.conf

#install and setup wp
WORKDIR /var/www/localhost/
RUN wget https://ru.wordpress.org/wordpress-5.4.2-ru_RU.tar.gz
RUN tar zxvf wordpress-5.4.2-ru_RU.tar.gz
RUN mv wordpress/* ./
COPY ./configs/wp-config.php ./
RUN rm -rf wordpress wordpress-5.4.2-ru_RU.tar.gz
RUN chown -R www-data:www-data /var/www/*
RUN chmod 755 -R /var/www/*

#start
EXPOSE 5050
RUN mkdir -p /run/nginx
RUN chmod +x /tmp/start.sh
ENTRYPOINT [ "/tmp/start.sh" ]