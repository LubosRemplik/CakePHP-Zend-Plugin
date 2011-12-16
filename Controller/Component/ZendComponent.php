<?php
/**
 * Zend Component 
 **/
class ZendComponent extends Component {
    
    public $components = array();

    function __construct(ComponentCollection $collection, $settings = array()) {
        parent::__construct($collection, $settings);
    }

    public function initialize($controller) {
    }

    public function startup($controller) {
    }

    public function beforeRender($controller) {
    }

    public function shutdown($controller) {
    }

    public function beforeRedirect($controller, $url, $status=null, $exit=true) {
    }
	
	public function import($key) {
		$this->__setIncludePath();
		App::import('Vendor', "Zend.$key", array(
			'file' => 'Zend' . DS . str_replace(DS, '/', $key) . '.php',
		));
	}
	
	private function __setIncludePath() {
		$separator = PATH_SEPARATOR; 
        $includePath = explode($separator, ini_get("include_path"));
        $includePath[] = dirname(dirname(dirname(__FILE__))) . DS . 'Vendor' . DS;
        ini_set("include_path", implode($separator, $includePath));
	}
}
