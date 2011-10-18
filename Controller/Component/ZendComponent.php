<?php

class ZendComponent extends Object {
	public $controller;
	
	function initialize(&$controller, $settings = array()) {
        $this->controller = $controller;
    }
    
	function import($key) {
		$this->__setIncludePath();
		App::import('Vendor', $key, array(
			'file' => 'Zend' . DS . str_replace(DS, '/', $key) . '.php',
			'plugin' => 'Zend'
		));
	}
	
	private function __setIncludePath() {
		$separator = PATH_SEPARATOR; 
        $includePath = explode($separator, ini_get("include_path"));
        $includePath[] = dirname(dirname(dirname(__FILE__))) . DS . 'vendors' . DS;
        ini_set("include_path", implode($separator, $includePath));
	}
}