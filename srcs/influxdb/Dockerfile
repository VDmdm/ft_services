FROM alpine:latest

#install influx
RUN apk add openrc
RUN apk add influxdb

VOLUME [ "/sys/fs/cgroup" ]
COPY ./start.sh /tmp/start.sh

#start
EXPOSE 3000
RUN chmod +x /tmp/start.sh
ENTRYPOINT [ "/tmp/start.sh" ]