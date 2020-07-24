#!/bin/bash

ok=$'\e[1;32mok\e[0m'
fail=$'\e[1;31mfail\e[0m'

docker_name=( 	"nginx" "phpmyadmin"\
				"wordpress" "mysql"\
				"grafana" "influxdb"\
				"telegraf" "ftps")

docker_build=( 	"nginx_my" "pma_my"\
				"wp_my" "mysql_my"\
				"grafana_my" "influxdb_my"\
				"telegraf_my" "ftps_my")

#Minikube start
minikube start	--vm-driver=virtualbox \
				--cpus=2 --memory 2000 ;
minikube addons enable metallb;
minikube addons enable metrics-server;
kubectl apply -f ./srcs/k8/configmap.yaml >> log_setup 2>> error
eval $(minikube docker-env);

#Build docker images
printf "\nBuild docker-images:\n"
for ((i=0;i<8;i++))
do
echo -n "${docker_name[i]}: "
if docker build -t ${docker_build[i]} ./srcs/${docker_name[i]} >> log 2>> error; then echo "${ok}"; else echo "${fail}"; fi
done

#Setup k8 deployment
printf "\nSetup k8:\n"
for ((i=0;i<8;i++))
do
echo -n "${docker_name[i]}: "
if kubectl create -f ./srcs/k8/${docker_name[i]}.yaml  >> log_setup 2>> error_setup; then echo "${ok}"; else echo "${fail}"; fi
done

printf "\n\nkubernetes cluster started!\n\
grafana:	http://192.168.99.100:3000 (admin/admin)\n\
nginx:		http://192.168.99.101\n\
		https://192.168.99.101\n\
		ssh: ssh_user@192.168.99.101 (ssh_admin)\n\
phpmyadmin:	http://192.168.99.102:5000 (admin/admin)\n\
wordpress:	http://192.168.99.103:5050 (admin/admin_serve)\n\
---\n\
ftps_server:	192.168.99.104:21 (ftps/ftps_admin)\n"
