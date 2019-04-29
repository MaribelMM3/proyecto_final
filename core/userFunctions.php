<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

function removeMagicQuotes() {

	if (get_magic_quotes_gpc()) {

		$_GET = stripSlashesDeep($_GET );
		$_POST = stripSlashesDeep($_POST);
		$_COOKIE = stripSlashesDeep($_COOKIE);

	}

}

/** Check register globals and remove them **/
function unregisterGlobals() {

	if (ini_get('register_globals')) {

		$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var === $GLOBALS[$key]) {
					unset($GLOBALS[$key]);
				}
			}
		}
	}

}
/** Execute functions **/
removeMagicQuotes();
unregisterGlobals(); 