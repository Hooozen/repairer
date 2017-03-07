<?php
	
	define("ROOT",dirname(__FILE__));
	echo get_include_path()."<br/>";
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.get_include_path());
	echo ".".PATH_SEPARATOR.ROOT."/lib<br/>".PATH_SEPARATOR.ROOT."/core<br/>".PATH_SEPARATOR.get_include_path()