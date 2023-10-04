<?php

class Rooter {
	public static function redirectToPage($pageName) {
		header("location: index.php?page=" . $pageName);
		exit;
	}
}
