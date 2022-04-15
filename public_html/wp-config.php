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
define( 'DB_NAME', 'j96036fz_base' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'j96036fz_base' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'o%30cFPh' );

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
define( 'AUTH_KEY',         ']1*FBPZz$USfNSAk(Atef1|V<_lBvFDPB ,bL_M2v(_5V{ 4DC1XR8,u^)0X=BD)' );
define( 'SECURE_AUTH_KEY',  '<#.3.m_+|RmppLKzRuQ.N2xCK7BV`z,c]`1d!]g4]m| z#<[ipYZX&|<jEUvR]]l' );
define( 'LOGGED_IN_KEY',    '/V<(bPEay)55N290?.fr6|`ciYyp_h$.q{;!-_*1E kKFD|z*pe[@Cv}r!w[^&Sc' );
define( 'NONCE_KEY',        'Ro^4=H[j)]e+_N;pVP<w^L?vX e(6{q(G/dJsL`=m^DV:bL#C-l$&]*)C,9A}+h>' );
define( 'AUTH_SALT',        'N|aveS>x66X=f?<4:UV|PdizAqr4Cq9BS9=}v:v[|r[U(:{hFc^+_[swjiUG[(Z9' );
define( 'SECURE_AUTH_SALT', '[1PLsMsS%?csnW7u1w(c/owIm?@vM_!/>xj:evvK5[}lo0wn[t(T&EqJ#dW2_tcU' );
define( 'LOGGED_IN_SALT',   ' x%A/`Wjag&cAF1S46$Y,^R#-hwApmt$Lf;?NpUT*x6u*C`Wy1b;mICgX0/%$7;f' );
define( 'NONCE_SALT',       'eHwXAmS<?[V^Ys/?Ax?<]O@jAK|DY-Vq3g-T6p7D|V{&|aR%{vN$H[{qA``78Uw;' );

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
