<?php
$cmcPath	= 'cmClasses/';
$cmcVersion	= '';
$darkMode	= !TRUE;

/*  --  NO NEED TO CHANGE BELOW  --  */
require_once $cmcPath.$cmcVersion.'/autoload.php5';
class FontAwesomeIndex{
	public function __construct( $darkMode = FALSE ){
		$list	= $this->read();
		$this->render( $list, $darkMode );
	}

	protected function read(){
		$list		= array();
		$pattern	= '/^\.fa-(.+):before {$/';
		$content	= file_get_contents( "font-awesome.css" );
		$lines		= explode( "\n", $content );
		foreach( $lines as $line ){
			if( preg_match( $pattern, $line ) ){
				$list[]	= preg_replace( $pattern, "\\1", $line );
			}
		}
		return $list;
	}

	protected function render( $iconClasses, $darkMode = FALSe ){
		$list	= array();
		foreach( $iconClasses as $item ){
			$icon	= UI_HTML_Tag::create( 'i', '', array(
				'class'	=> 'fa fa-2x fa-'.$item.( $darkMode ? ' fa-inverse' :'' ),
				'title'	=> $item,
			) );
			$list[]	= UI_HTML_Tag::create( 'li', $icon, array(
				'class' => 'icon-container',
				'id'	=> 'icon-'.$item,
			) );
		}
		$list	= UI_HTML_Tag::create( 'ul', $list, array(
			'id'	=> 'icon-matrix',
			'class'	=> 'unstyled',
		) );

		$style	= '
body.dark {
	background-color: rgba(0,0,0,1);
	color: rgba(255,255,255,0.75);
	}
#icon-matrix .icon-container {
	float: left;
	width: 48px;
	height: 48px;
	vertical-align: middle;
	text-align: center;
	margin: 3px;
}
.fa-2x {
	line-height: 2em;
}
.fa-4x {
	line-height: 1em;
}
';
		$script	= '
$(document).ready(function(){
	$(".icon-container").bind("mouseenter", function(){
		$(this).children("i").addClass("fa-4x");
	}).bind("mouseleave", function(){
		$(this).children("i").removeClass("fa-4x");
	}).bind("click", function(){
		var query = $(this).children("i").prop("title");
		$(this).trigger("mouseleave");
		$("#search").val(query).trigger("keyup");
	});
	$("#search").bind("keyup", function(){
		var query = $(this).val();
		$(".icon-container i").each(function(){
			var matching = $(this).prop("title").match(query);
			matching ? $(this).parent().show() : $(this).parent().hide();
		});
	}).focus();
});';
		$body	= '
<div class="container">
	<h2>Font Awesome <span class="muted">Index</span></h2>
	<div class="row-fluid">
		<div class="span12">
			<input type="search" id="search" placeholder="search"></input>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			'.$list.'
		</div>
	</div>
</div>';

		$page	= new UI_HTML_PageFrame();
		$page->addStylesheet( '/lib/cmStyles/bootstrap.min.css' );
		$page->addStylesheet( 'font-awesome.min.css' );
		$page->addJavaScript( '/lib/cmScripts/jquery/1.10.2.min.js' );
		$page->addJavaScript( '/lib/cmScripts/bootstrap.min.js' );
		$page->addHead( UI_HTML_Tag::create( 'style', $style ) );
		$page->addHead( UI_HTML_Tag::create( 'script', $script ) );
		$page->addBody( $body );
		print( $page->build( array( 'class' => $darkMode ? 'dark' : 'bright' ) ) );
	}

}
new FontAwesomeIndex( $darkMode );
