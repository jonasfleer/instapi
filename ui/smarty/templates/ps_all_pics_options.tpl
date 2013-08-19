{extends file="layout.tpl"}
{block name=layer1}

<table>
	<tr>
		<td><img src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_3"></td>
		<td><img src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_2"></td>
	</tr>
	<tr>
		<td><img src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_1"></td>
		<td><img src="http://{$smarty.server.SERVER_NAME}/instapi_pics.php?id={$pic_session_id}_0"></td>
	</tr>
</table>

{/block}


