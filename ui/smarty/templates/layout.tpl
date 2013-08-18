<html>
<head>
  <title>{block name=title}Instapi Photobooth{/block}</title>
  {block name=head}{/block}
  <style type="text/css">
	body { background-color: #ff0000; }
	input { font-size: 4em; }
  </style>
</head>
<body>
	<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
	<div style="display:none">
		<a accesskey="s" href="{$SCRIPT_NAME}?action={$key_select}">{$key_select}</a>
		<a accesskey="w" href="{$SCRIPT_NAME}?action={$key_up}">{$key_up}</a>
		<a accesskey="a" href="{$SCRIPT_NAME}?action={$key_left}">{$key_left}</a>
		<a accesskey="d" href="{$SCRIPT_NAME}?action={$key_right}">{$key_right}</a>
		<a accesskey="x" href="{$SCRIPT_NAME}?action={$key_down}">{$key_down}</a>
		<a accesskey="q" href="{$SCRIPT_NAME}?action={$key_menu}">{$key_menu}</a>
	</div>
	
	<table border="0">
	      <tr>
	        <td><form method="POST" name="t">
	          <table border="1" cellpadding="5">
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>width:</strong></td>
	              <td><input type="text" size="20" name="t1"></td>
	            </tr>
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>height:</strong></td>
	              <td><input type="text" size="20" name="t2"></td>
	            </tr>
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>availWidth</strong></td>
	              <td><input type="text" size="20" name="t5"></td>
	            </tr>
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>availHeight</strong></td>
	              <td><input type="text" size="20" name="t6"></td>
	            </tr>
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>colorDepth:</strong></td>
	              <td><input type="text" size="20" name="t3"></td>
	            </tr>
	            <tr>
	              <td valign="top" width="150" bgcolor="#D8EA99"><strong>pixelDepth: </strong></td>
	              <td><input type="text" size="20" name="t4"></td>
	            </tr>
	          </table>
	        </form>
	        </td>
	      </tr>
	    </table>
	
		<script type="text/javascript">
		function show(){
		if (!document.all&&!document.layers&&!document.getElementById)
		return
		document.t.t1.value=screen.width
		document.t.t2.value=screen.height
		document.t.t3.value=screen.colorDepth
		document.t.t4.value=screen.pixelDepth
		document.t.t5.value=screen.availWidth
		document.t.t6.value=screen.availHeight
		}
		show()

		</script>
	
	
	{block name=body}{/block}
</body>
</html>