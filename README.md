# Test-contact-form

##環境構築

Dockerビルド

1.git clone git@github.com:Haruki1799/Test-contact-form.git
2.docker-compose up -d --build

Laravel環境構築
1.docker-compose exec php bash
2.composer -v
3.composer create-project "laravel/laravel=8.*" . --prefer-dist
4.composer install
5./config/app.phpのtimezoneを変更
6.env.exampleファイルから.envを作成し、環境変数を変更
7.php artisan make:migration create_categories_table
8.php artisan make:migration create_users_table
9.php artisan make:migration create_contacts_table
10.php artisan migrate
11.php artisan key:generate


##使用技術（実行環境）
・php 7.4.9
・Lavavel 
・MySQL 8.0.26
