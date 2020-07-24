FROM alpine:latest

#install grafana server
RUN wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub
RUN wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.31-r0/glibc-2.31-r0.apk
RUN apk update && apk upgrade
RUN apk add openrc glibc-2.31-r0.apk
RUN echo "http://nl.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories && apk update
RUN apk add telegraf

VOLUME [ "/sys/fs/cgroup" ]

#start
COPY ./start.sh /tmp/start.sh
COPY ./config/telegraf.conf /tmp/telegraf.conf
RUN chmod +x /tmp/start.sh

ENTRYPOINT [ "/tmp/start.sh" ]