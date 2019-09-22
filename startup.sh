#!/bin/bash

echo 'Symfony security check'
symfony security:check --dir=api

echo 'Install composer packages'
composer install --prefer-dist -d api

echo 'Install yarn packages and build frontend'
yarn --cwd frontend && yarn --cwd frontend build

echo 'Enter api root to run tests and start server'
cd api

echo 'Run tests'
./bin/phpunit tests/CalculationTests.php

echo 'Start development server'
symfony server:start

