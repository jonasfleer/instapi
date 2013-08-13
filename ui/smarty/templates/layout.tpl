<html>
<head>
  <title>{block name=title}Instapi Photobooth{/block}</title>
  {block name=head}{/block}
</head>
<body>
<div style="display:none">
	<a accesskey="s" href="{$SCRIPT_NAME}?action={$key_select}">{$key_select}</a>
	<a accesskey="w" href="{$SCRIPT_NAME}?action={$key_up}">{$key_up}</a>
	<a accesskey="a" href="{$SCRIPT_NAME}?action={$key_left}">{$key_left}</a>
	<a accesskey="d" href="{$SCRIPT_NAME}?action={$key_right}">{$key_right}</a>
	<a accesskey="x" href="{$SCRIPT_NAME}?action={$key_down}">{$key_down}</a>
	<a accesskey="q" href="{$SCRIPT_NAME}?action={$key_menu}">{$key_menu}</a>
</div>
{block name=body}{/block}
</body>
</html>