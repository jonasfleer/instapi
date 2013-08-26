{extends file="layout.tpl"}
{block name=layer1}

<table>
	<tr>
		<td><img class="all_pics_preview" src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_3&type=thumb"></td>
		<td><img class="all_pics_preview" src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_2&type=thumb"></td>
	</tr>
	<tr>
		<td><img class="all_pics_preview" src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_1&type=thumb"></td>
		<td><img class="all_pics_preview" src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_0&type=thumb"></td>
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
{/block}
