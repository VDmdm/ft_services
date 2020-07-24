FROM alpine:latest

#install nginx and openssl
RUN apk update && apk upgrade
RUN apk add nginx openssl openssh supervisor
RUN apk add openrc

VOLUME [ "/sys/fs/cgroup" ]

#copy file
COPY ./start.sh /tmp/start.sh
COPY ./configs/nginx-localhost /etc/nginx/conf.d/default.conf
COPY ./configs/supervisor.conf /etc/supervisord.conf

#create ssl cert and key
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt -subj "/C=RU/ST=-/L=-/O=-/OU=-/CN=ft_server.ru/emailAddress=admin@ft_server.com"
RUN echo -e "ssh_admin\nssh_admin" | adduser ssh_user

#start
EXPOSE 80 443 22
RUN mkdir -p /run/nginx
RUN chmod +x /tmp/start.sh
ENTRYPOINT ["/tmp/start.sh" ]