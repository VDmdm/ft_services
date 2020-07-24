FROM alpine:latest

#install vsftpd
RUN apk update && apk upgrade
RUN apk add vsftpd openssl
RUN apk add openrc

VOLUME [ "/sys/fs/cgroup" ]
COPY ./start.sh /tmp/

#create ssl cert and key
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ftps-selfsigned.key -out /etc/ssl/certs/ftps-selfsigned.crt -subj "/C=RU/ST=-/L=-/O=-/OU=-/CN=ft_server.ru/emailAddress=admin@ft_server.com"

#vsftpd settings
COPY ./config/vsftpd.conf /etc/vsftpd/vsftpd.conf
RUN echo -e "ftps_admin\nftps_admin" | adduser ftps

#start
EXPOSE 20 21 2020 2021
RUN chmod +x /tmp/start.sh
ENTRYPOINT [ "/tmp/start.sh" ]