<?php
// to be continued

/**
 * Ce module permet de faire du logging parametrable.
 * 
 * En phase de developpement on met LOG_ALL, et à la place des 'console_log(...)' ou des 'echo (...)'
 * on ecrit des log_event(..., ..;);
 * ensuite quand le developpement est satisfaisant on definit '$g_log_level = LOG_NONE;' un peu plus 
 * bas ici et toutes ces traces vont disparaitre.
 * Cela permet de les reactiver facilement en cas de besoin ;-)
 */

# system logging
# The logging levels can be combined using bitwise operators
define( 'LOG_ALL', ~0 );            # All possible log levels
define( 'LOG_NONE', 0 );            # no logging
define( 'LOG_MYSQL', 1 );           # log MySql event
define( 'LOG_SESSION', 2 );         # details of session
define( 'LOG_INDICE', 4 );          # logging for indice.


$g_log_level = LOG_NONE;

/**
 * Log an event
 * @param integer          $p_level Valid debug log level.
 * @param string|array,... $p_msg   Either a string, or an array structured as (string,execution time).
 * @return void
 */
function log_event( $p_level, $p_msg ) {
    global $g_log_level;
	// to be continued
    if ( $g_log_level == LOG_ALL){
	    echo($p_msg);
	}
}
?>
