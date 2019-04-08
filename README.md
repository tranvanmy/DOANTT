## Create folders

```
#!terminal

cp .env.example .env && mkdir bootstrap/cache storage storage/framework && cd storage/framework && mkdir sessions views cache

```

## Folder permissions

```
#!terminal

sudo chown :www-data app storage bootstrap -R
sudo chmod 775 app storage bootstrap -R

```

## Install dependencies

```
#!terminal

composer install

```

