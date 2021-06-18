#!/usr/bin/env bash

multipass launch --name k3s --mem 4G --disk 20G --cpus 2
multipass mount $HOME/Sites/laravel-bjyblog k3s:/laravel-bjyblog/site
