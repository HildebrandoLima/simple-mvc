<?php
class Route {

	public static $validaRotas = array();

	public static function set($routa, $function) {
		self::$validaRotas[] = $routa;
		//print_r(self::$validRoutes);
		if($_GET['url'] == $routa) {
			$function->__invoke();
		}
	}
}
?>