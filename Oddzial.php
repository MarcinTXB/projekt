<?php


class Oddzial {
	private $symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email;
	public static $nazwaTabOddzial = 'Oddzial';
			
	function __construct($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email){
		$this->symbol_oddzialu = $symbol_oddzialu;
		$this->nazwa_oddzialu  = $nazwa_oddzialu;
		$this->miasto          = $miasto;
		$this->ulica           = $ulica;
		$this->telefon	       = $telefon;
		$this->email	       = $email;				
	}
}

?>