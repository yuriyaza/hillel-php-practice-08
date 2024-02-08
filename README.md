### Мінімізатор URL (URL Shortener)

Сервіс для мінімізіції URL

**Створення БД:**<br>
php artisan migrate<br>
php artisan migrate:refresh

**Роут для мінімізації URL:**<br>
/minimize?url=*ваш_повний_url*<br>

Наприклад:<br>
/minimize?url=https://www.google.com/search?q=What+is+URL+shortener

Буде сформовано мінімізований URL. Наприклад:<br>
/8ac9hw

**Роут для відновлення повного URL:**<br>
/*ваш_короткий_url*

Наприклад:<br>
/8ac9hw
