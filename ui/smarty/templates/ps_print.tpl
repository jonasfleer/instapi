{extends file="layout.tpl"}
{block name=layer3}

	<div class="overlay" id="overlay_print">
		<table>
			<tr><td style="width:200px">Drucke ...</td></tr>
		</table>
	</div>
	
	<script type="text/javascript">
		
		function displayMenu() {
			window.location = '{$smarty.server.SCRIPT_NAME}?action=Menu&pic_session_id={$pic_session_id}';
		}
		
		$.ajax({
		  url: 'http://{$smarty.server.SERVER_NAME}/print.php?id={$pic_session_id}',
		  success: setTimeout(displayMenu, 3000)
		});

	</script>


{/block}