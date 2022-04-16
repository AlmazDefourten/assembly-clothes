<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'u1655667_wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'u1655667_admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '123654Gg.@' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8T/Xu,Y2!|q9q14aONAJexKl^IK,h{FIjaYqd0/CU$|cGbC~3l?q-/TVqY.9VDu(' );
define( 'SECURE_AUTH_KEY',  '$C49nVf:cE,Xf{k|Sl;?|^B|W< Y:5hG5<K.|* !Ews6fHkfX59}Ql/>*ht^^Yws' );
define( 'LOGGED_IN_KEY',    'O%S=z2te _RAohx&x8S&(2E6]trn):bsyE=X2(W]/0A&3GOqyLne>R>Z:5vZ|Cox' );
define( 'NONCE_KEY',        '):E#:jKnR@ItWh?KiTG/?^i4m*#!E&,]rh4##zM08hR&VebECwZ6q M5K3-R>QA:' );
define( 'AUTH_SALT',        '_B9bF/.ayiJz}mj*PA@F#gv|agC~*dL9<q~gUkCvf5g:^qemTKi[cM>s=E6lq5g(' );
define( 'SECURE_AUTH_SALT', 'Q$+4MYh] b4`7$6l/7z#^nY;!|cyp2OU5jJ*_w<8[kC(X:<]j:!|KZftzB+D;~_/' );
define( 'LOGGED_IN_SALT',   'W_`u-H/@=4:k*K?#V**4re4p0JzKSZeckjw[>9kf|n=ML!;FyJ9,RDJSI_[-j>sM' );
define( 'NONCE_SALT',       '{Mem[Jm>P-JF!mS`D[8;6,a-Zw`i3^JBgr9v#Jm.6XZ+&`k&wyx#4Y)D%:-@$}36' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
