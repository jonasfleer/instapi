{extends file="layout.tpl"}
{block name=layer1}

<img id="preview" src="http://{$smarty.server.SERVER_NAME}/raspistill.php?w=320&h=240&mode=show" width="320" height="240" border="0" />

<script type="text/javascript">
$('#preview').load(function() {
	setTimeout(function(){
		$("#preview").attr("src", "http://{$smarty.server.SERVER_NAME}/raspistill.php?w=320&h=240&mode=show&"+new Date().getTime());
		},100);
	});
	</script>

{/block}

{block name=layer2}

	<div id="countdown_foto"></div>
	<div id="countdown_time"></div>

	<script type="text/javascript">
	{literal}
		var time_count=10;
		var pic_count=4;
		$('#debug').text('time_count='+time_count + ' pic_count='+pic_count);

		var counter=setInterval(mytimer, 1000); //1000 will run it every 1 second
		
		function triggerThumbCreation(pic_session_id, pic_num) {
			$.ajax({
			{/literal}
			  url: 'http://{$smarty.server.SERVER_NAME}/img_process_async.php?id={$pic_session_id}' + '_' + pic_num + '&mode=thumb'
			{literal}
			});
		}

		function takeBigPic(pic_session_id, pic_num) {
			$.ajax({
			{/literal}
			  url: 'http://{$smarty.server.SERVER_NAME}/raspistill.php?w=1920&h=1080&q=100&mode=save&id={$pic_session_id}' + '_' + pic_num + '&create_thumb=true'
			  /* success: triggerThumbCreation(pic_session_id, pic_num) */
			{literal}
			});
		}
		
		function displayAllPicsOptions() {
			{/literal}
				window.location = '{$smarty.server.SCRIPT_NAME}?action=AllPicsOptions&pic_session_id={$pic_session_id}';
			{literal}
		}

		function mytimer()
		{
			time_count=time_count-1;
			updateTimerView(pic_count, time_count);
			if (time_count <= 0) {
				// time counter ended, do something here
				{/literal}
			      takeBigPic('{$pic_session_id}', pic_count);
				{literal}
				$('#flash').fadeIn(500, function () {
				      $('#flash').fadeOut(500);
				});
				time_count=8;
				pic_count=pic_count-1;
				if (pic_count<=0) {
					clearInterval(counter);
					setTimeout(displayAllPicsOptions, 1000);
				}
			}
		}
	
		function updateTimerView(_pic_count, _time_count) {
			$('#debug').text('time_count='+_time_count + ' pic_count='+_pic_count);
			
			if (_time_count<=0 && _pic_count<=0) {
				$("#countdown_foto").text("Printing ...");
				$("#countdown_time").text("");
			} else if (pic_count<=0) {
				$("#countdown_foto").text("Smile!");
				$("#countdown_time").text("");
			} else {
				$("#countdown_foto").text("Foto " + (5 - _pic_count));
				$("#countdown_time").text(_time_count);
				$("#countdown_time").hide();
				$("#countdown_time").fadeIn(250);
			}
		}
	{/literal}
	</script>
</body>
{/block}

{block name=layer3}
<div id="flash">&nbsp;</div>
{/block}
