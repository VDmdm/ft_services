FROM alpine:latest

#install grafana server
RUN wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub
RUN wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.31-r0/glibc-2.31-r0.apk
RUN apk update && apk upgrade
RUN apk add openrc glibc-2.31-r0.apk
RUN wget https://dl.grafana.com/oss/release/grafana-7.0.6.linux-amd64.tar.gz
RUN tar -zxvf grafana-7.0.6.linux-amd64.tar.gz
RUN rm grafana-7.0.6.linux-amd64.tar.gz

VOLUME [ "/sys/fs/cgroup" ]
COPY ./start.sh /tmp/
COPY ./settings/grafana.db /grafana-7.0.6/data/grafana.db

#start
WORKDIR /grafana-7.0.6/bin
EXPOSE 3000
ENTRYPOINT [ "./grafana-server" ]