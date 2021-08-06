<?php
use UI_HTML_PageFrame as HtmlPage;

class FontAwesomeIndex
{
	protected $mode;

	public function __construct ($darkMode = FALSE)
	{
		$list	= $this->read();
		$this->mode	= $darkMode ? 'dark' : 'bright';
		print($this->render($list));
	}

	public static function handleException ($e)
	{

	}

	protected function read (): array
	{
		$list		= array();
		$pattern	= '/^\.fa-(.+):before {$/';
		$content	= file_get_contents( "inc/fontawesome/font-awesome.css" );
		$lines		= explode( "\n", $content );
		foreach ($lines as $line) {
			if (preg_match($pattern, $line)) {
				$list[]	= preg_replace($pattern, "\\1", $line);
			}
		}
		return $list;
	}

	protected function render ($iconClasses): string
	{
		$mode	= $this->mode;
		$page	= new HtmlPage();
		$page->addStylesheet('inc/bootstrap/bootstrap.min.css');
		$page->addStylesheet('inc/fontawesome/font-awesome.min.css');
		$page->addStylesheet('inc/style.css');
		$page->addJavaScript('inc/jquery-1.10.2.min.js');
		$page->addJavaScript('inc/bootstrap/bootstrap.min.js');
		$page->addJavaScript('inc/script.js');
		$page->addBody(require_once 'body.phpt');
		return $page->build(array('class' => $this->mode));
	}
}
