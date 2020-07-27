<?php

class Funcoes {

    public function trataCaracter($valor, $tipo) {
	switch($tipo) {
				case 1: $recebe = utf8_decode($valor);
			break;
				case 2: $recebe = utf8_encode($valor);
			break;
				case 3: $recebe = htmlentities($valor, ENT_QUOTES, "ISO-8859-1");
			break;
        }
        return $recebe;
    }

    public function dataAtual($tipo) {
	switch($tipo) {
				case 1: $recebe = date("Y-m-d");
			break;
				case 2: $recebe = date("Y-m-d H:i:s");
			break;
				case 3: $recebe = date("d/m/Y");
			break;
        }
        return $recebe;
    }

    public function base64($valor, $tipo) {
        switch($tipo) {
				case 1: $recebe = base64_encode($valor);
			break;
				case 2: $recebe = base64_decode($valor);
			break;
        }
        return $recebe;
    }
}
