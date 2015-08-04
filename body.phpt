<?php
$list	= array();
foreach( $iconClasses as $item ){
	$icon	= UI_HTML_Tag::create( 'i', '', array(
		'class'	=> 'fa fa-2x fa-'.$item.( $mode == 'dark' ? ' fa-inverse' :'' ),
		'title'	=> $item,
	) );
	$list[]	= UI_HTML_Tag::create( 'li', $icon, array(
		'id'	=> 'icon-'.$item,
	) );
}
$list	= UI_HTML_Tag::create( 'ul', $list, array(
	'id'	=> 'icon-matrix',
	'class'	=> 'unstyled',
) );

return '
<div class="container">
	<h2>Font Awesome <span class="muted">Index</span></h2>
	<div class="row-fluid">
		<div class="span3">
			<input type="search" id="search" placeholder="search" class="span12"></input>
		</div>
		<div class="span3">
			<label class="checkbox"'.( $mode == 'dark' ? 'checked="checked"' : '' ).'>
				<input type="checkbox" name="darkMode" id="input_darkMode" value="1" '.( $mode == 'dark' ? 'checked="checked"' : '' ).' onchange="FontAwesomeIndex.setMode(this)"/>
				Dark Mode
			</label>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			'.$list.'
		</div>
	</div>
</div>';
?>
