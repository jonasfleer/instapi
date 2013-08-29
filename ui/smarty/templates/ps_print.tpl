{extends file="layout.tpl"}
{block name=layer3}

	<div class="overlay" id="overlay_print">
		<table>
			<tr><td style="width:250px">Drucke ...</td></tr>
			<tr><td style="height:20px"></td></tr>
			<tr><td style="width:250px; font-size:20px">Kann schon mal 2-3 Minuten dauern ...</td></tr>
		</table>
	</div>
	
	<script type="text/javascript">
		function displayMenu() {
			window.location = '{$smarty.server.SCRIPT_NAME}?action=Menu&pic_session_id={$pic_session_id}';
		}
		
		$.ajax({
		  url: 'http://{$smarty.server.SERVER_NAME}/print.php?id={$pic_session_id}',
		  success: setTimeout(displayMenu, 5000)
		});
	</script>


{/block}