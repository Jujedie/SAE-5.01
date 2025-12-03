#!/bin/bash

php spark migrate
php spark serve
firefox http://localhost:8080 &