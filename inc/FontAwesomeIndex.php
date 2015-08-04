<?php
class FontAwesomeIndex{

	protected $mode;

	public function __construct ($darkMode = FALSE ) {
		$list	= $this->read();
		$this->mode	= $darkMode ? 'dark' : 'bright';
		$this->render($list);
	}

	static public function handleException ($e) {

	}

	protected function read () {
		$list		= array();
		$pattern	= '/^\.fa-(.+):before {$/';
		$content	= file_get_contents( "font-awesome.css" );
		$lines		= explode( "\n", $content );
		foreach ($lines as $line) {
			if (preg_match($pattern, $line)) {
				$list[]	= preg_replace($pattern, "\\1", $line);
			}
		}
		return $list;
	}

	protected function render ($iconClasses) {
		$mode	= $this->mode;
		$body	= require_once 'body.phpt';
		$page	= new UI_HTML_PageFrame();
		$page->addStylesheet('http://cdn.int1a.net/css/bootstrap.min.css');
		$page->addStylesheet('http://cdn.int1a.net/font/FontAwesome/font-awesome.min.css');
		$page->addStylesheet('inc/style.css');
		$page->addJavaScript('http://cdn.int1a.net/js/jquery/1.10.2.min.js');
		$page->addJavaScript('http://cdn.int1a.net/js/bootstrap.min.js');
		$page->addJavaScript('inc/script.js');
		$page->addBody($body);
		print $page->build(array('class' => $this->mode));
	}
}
