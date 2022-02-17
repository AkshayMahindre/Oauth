FROM php:7-apache

WORKDIR /app

RUN apt update && apt install -y \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/app --filename=composer \
    && rm -rf /var/lib/apt/lists/*
    
COPY composer.lock composer.json /app

COPY . /app

EXPOSE 80