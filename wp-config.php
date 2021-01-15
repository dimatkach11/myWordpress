<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Chiavi Segrete
 * * Prefisso Tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'myWordpress1' );

/** Nome utente del database MySQL */
define( 'DB_USER', 'myWordpress' );

/** Password del database MySQL */
define( 'DB_PASSWORD', 'myWordpress' );

/** Hostname MySQL  */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`XK*?w(_Lkx!mS@wx=cx+^e3s3w(S9Tsac[$s6Xu,ZfbnPe_5Y(HtGZb[s-<d?7d' );
define( 'SECURE_AUTH_KEY',  'm;l?JG!R}^#{Wj{Q^5^.lN-!+H,w$A5/Y-v,%h[LV^O>AuiT@n#E}S!f9m|[Zxf2' );
define( 'LOGGED_IN_KEY',    'o@:,Y&G[mgpt=sd.$lkDn}Ej0%+4z8No~U+!kzDzNrdg9G84VT{-?4LSg<m<g6)<' );
define( 'NONCE_KEY',        '0omJ4?3}2/0B(4))KKLbDP9L[0)Nv~X][:W$Z@fa6*UXn|@<P$FXTJV]]:=3v>-e' );
define( 'AUTH_SALT',        '6ct3>K^k6o^c=O@7Q9PIe;C Cr8Hv|7]^V$W2_F43-_HZW7RG/q%_~DCe<K@QPIq' );
define( 'SECURE_AUTH_SALT', '6GGve.E<KX:)AZ&t8QEph>/vsKIG%$Up8;@zF+TqFb+ntCSTRC(fQCvx:mhDo^#(' );
define( 'LOGGED_IN_SALT',   'p7/h?bzA85}_Olds=oY>~ZB*k5O3;xL_EWi%+k%5H#AANH4Ce1,uN1HK}]U=,(w2' );
define( 'NONCE_SALT',       '5c9@x)OgCI=4OEa:a6!6eUT^U`})pDZTQ%5z%JS WP/[5(U%a<^:>S_!([ysfGO0' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
