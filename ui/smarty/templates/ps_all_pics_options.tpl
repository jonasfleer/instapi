{extends file="layout.tpl"}
{block name=layer1}

<table>
	<tr class="all_pics_preview">
		<td class="all_pics_preview"><img class="lazy all_pics_preview" id="thumb4" data-src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_4&type=thumb" src="img/blank.gif" /></td>
		<td class="all_pics_preview"><img class="lazy all_pics_preview" id="thumb3" data-src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_3&type=thumb" src="img/blank.gif" /></td>
	</tr>
	<tr class="all_pics_preview">
		<td class="all_pics_preview"><img class="lazy all_pics_preview" id="thumb2" data-src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_2&type=thumb" src="img/blank.gif" /></td>
		<td class="all_pics_preview"><img class="lazy all_pics_preview" id="thumb1" data-src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_1&type=thumb" src="img/blank.gif" /></td>
	</tr>
</table>

{/block}

{block name=layer3}
<div class="overlay" id="overlay_all_pics_options">
	<table>
		<tr><td class="pic_options_menu_icon"><img src="img/icon_play_grey.png"></td><td>Drucken</td></tr>
		<tr><td class="pic_options_menu_icon"><img src="img/icon_forward_grey.png"></td><td>Neues Foto</td></tr>
	</table>
</div>

<script type="text/javascript">
	$(function(){
		$('#thumb4').jail({
			timeout: 1000,
			effect: 'fadeIn',
			speed : 1500
		});
		$('#thumb3').jail({
			timeout: 2000,
			effect: 'fadeIn',
			speed : 1500
		});
		$('#thumb2').jail({
			timeout: 3000,
			effect: 'fadeIn',
			speed : 1500
		});
		$('#thumb1').jail({
			timeout: 4000,
			effect: 'fadeIn',
			speed : 1500
		});
		setTimeout(function() {
			$('#overlay_all_pics_options').fadeIn(2000)
		}, 6000);
		
	});
</script>
	
{/block}
