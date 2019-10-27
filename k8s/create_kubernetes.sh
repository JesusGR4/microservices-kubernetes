#!/bin/bash

function setup_config_maps(){
    kubectl apply -f confimap.yaml
    kubectl apply -f laravelcm.yaml
    kubectl apply -f mysqlcm.yaml
    kubectl apply -f mysqlcm-django.yaml
    kubectl apply -f postgrescm.yaml
}

function setup_services(){
    kubectl apply -f django-svc.yaml
    kubectl apply -f laravel-svc.yaml
    kubectl apply -f mysql-django-svc.yaml
    kubectl apply -f postgres-svc.yaml
}

function setup_ingress(){
    kubectl create clusterrolebinding cluster-admin-binding --clusterrole cluster-admin --user $(gcloud config get-value account)
    kubectl apply -f ingress-controller-nginx.yaml
    kubectl apply -f ingress-nginx.yaml
}

function setup_pvc(){
    kubectl apply -f mysql-django-pvc.yaml
    kubectl apply -f mysql-pvc.yaml
    kubectl apply -f postgres-pvc.yaml
}

function setup_secrets(){
    kubectl apply -f secret.yaml
    kubectl apply -f secret-django.yaml
}

function setup_deployments(){
    kubectl apply -f django-deployment.yaml
    kubectl apply -f postgres-deployment.yaml
    kubectl apply -f mysql-django-deployment.yaml
    kubectl apply -f mysql-deployment.yaml
    kubectl apply -f laravel-deployment.yaml
}

setup_config_maps
setup_services
setup_ingress
setup_pvc
setup_secrets
setup_deployments