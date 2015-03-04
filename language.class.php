<?php
/* ------------------------------
Language Klasse
--------------------------------- */

class Language {
	private $lang;

	public function __construct() {
		if(isset($_SESSION['lang'])) {
			$this->lang = $_SESSION['lang']; // Validation fehlt
		}
		else {
			$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	        if($lang == "de") {
		        $_SESSION['lang'] = "DE";
	        }
	    	else {
		        $_SESSION['lang'] = "EN";
	        }
	        $this->lang = $_SESSION['lang'];
		}
	}

	/* --------------------------------
	Gibt die aktuelle Sprache zurück
	---------------------------------- */
	public function getLang() {
		return $this->lang;
	}

	/* --------------------------------
	Gibt den angeforderten String in der
	ausgewählten Sprache zurück
	--------------------------------- */
	public function getString($str) {
		return $lang[$str];
	}
	
	/* ------------------------------
	Ändert die gespeicherte Sprache
	--------------------------------- */
	public function changeLang($str) {
		$this->lang = $str;
		$_SESSION['lang'] = $str;

	}
}

?>