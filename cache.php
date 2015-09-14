<?php

class Cache {
	protected static $_target = '';

	public static function start()
	{
		self::$_target = $_SERVER['REQUEST_URI'];
		if (self::$_target == '/') {
			self::$_target = 'index.php';
		}
		self::$_target = './cached/'.self::$_target.'.html';

		if (file_exists(self::$_target)) {
			error_log('hits cache in PHP');
			echo file_get_contents(self::$_target);
			exit();
		}

		ob_start();
	}

	public static function flush()
	{
		$content = ob_get_contents();

		mkdir(dirname(self::$_target), 0777, true);
		file_put_contents(self::$_target, $content);
	}
}
