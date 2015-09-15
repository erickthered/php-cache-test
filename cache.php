<?php

class Cache {
	protected static $_target = '';
	protected static $_dir = './cached/';
	protected static $_perms = 0777;
	protected static $_recursive = true;

	public static function start()
	{
		self::$_target = $_SERVER['REQUEST_URI'];
		if (self::$_target == '/') {
			self::$_target = 'index.php';
		}
		self::$_target = self::$_dir.self::$_target.'.html';

		if (file_exists(self::$_target)) {
			echo file_get_contents(self::$_target);
			exit();
		}

		ob_start();
	}

	public static function flush()
	{
		$content = ob_get_contents();

		mkdir(dirname(self::$_target), self::$_perms, self::$_recursive);
		file_put_contents(self::$_target, $content);
	}
}
