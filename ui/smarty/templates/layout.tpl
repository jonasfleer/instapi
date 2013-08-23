<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>{block name=title}Instapi Photobooth{/block}</title>
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{block name=head}{/block}
	</head>

	<body lang="en">
		<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
		<div style="display:none">
				{if $key_select}<a accesskey="s" href="{$SCRIPT_NAME}?action={$key_select}&pic_session_id={$pic_session_id}">{$key_select}</a>{/if}
				{if $key_up}<a accesskey="w" href="{$SCRIPT_NAME}?action={$key_up}&pic_session_id={$pic_session_id}">{$key_up}</a>{/if}
				{if $key_left}<a accesskey="a" href="{$SCRIPT_NAME}?action={$key_left}&pic_session_id={$pic_session_id}">{$key_left}</a>{/if}
				{if $key_right}<a accesskey="d" href="{$SCRIPT_NAME}?action={$key_right}&pic_session_id={$pic_session_id}">{$key_right}</a>{/if}
				{if $key_down}<a accesskey="x" href="{$SCRIPT_NAME}?action={$key_down}&pic_session_id={$pic_session_id}">{$key_down}</a>{/if}
				{if $key_menu}<a accesskey="q" href="{$SCRIPT_NAME}?action={$key_menu}">{$key_menu}</a>{/if}
		</div>
		<style type="text/css">
		</style>
		<div id="content">
			{block name=body}{/block}
			<div id="layer1" class="layer">{block name=layer1}{/block}</div>
			<div id="layer2" class="layer">{block name=layer2}{/block}</div>
			<div id="layer3" class="layer">{block name=layer3}{/block}</div>
			<div id="layer4" class="layer">{block name=layer4}{/block}</div>
		</div>

	</body>
</html>
