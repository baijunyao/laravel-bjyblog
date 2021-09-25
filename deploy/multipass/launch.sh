#!/usr/bin/env bash

multipass launch --name k3s --mem 8G --disk 20G --cpus 6 --cloud-init cloud-init.yml
multipass mount $HOME/Sites/laravel-bjyblog k3s:/laravel-bjyblog/site
