#!/bin/bash

echo 'Install yarn packages and build frontend'
yarn --cwd frontend && yarn --cwd frontend build --fix

echo 'Symfony security check'
symfony security:check --dir=api

echo 'Install composer packages'
composer install --prefer-dist -d api

echo 'Run tests'
cd api && cp phpunit.xml.dist phpunit.xml && ./vendor/bin/simple-phpunit tests/CalculationTests.php

echo 'Start development server'
symfony server:start

