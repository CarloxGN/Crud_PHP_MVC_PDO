<?php
class Router {
	public function chargeViews($pg) {
		switch ($pg):
			case 'start':
				include 'views/'.$pg.'.php';
				break;

			case 'modificar':
				include 'views/'.$pg.'.php';
				break;

			case 'ejecutar':
				include 'bin/'.$pg.'.php';
				break;

			default:
				include 'views/404.php';
				break;
		endswitch;
	}

	public function validGET($pg) {
		if (empty($pg)) {
			include_once 'views/start.php';
		} else {
			return true;
		}
	}
}
