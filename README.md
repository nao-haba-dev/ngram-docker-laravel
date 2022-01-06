# Laravel+MySQLの全文検索機能を導入したら素晴らしかった件

https://qiita.com/naoki-haba/items/ace7a5d1e0d9d72ed040

# セットアップ

```bash
cd docker-laravel
docker-compose up -d
docker-compose exec app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
chmod -R 777 storage bootstrap/cache
```
