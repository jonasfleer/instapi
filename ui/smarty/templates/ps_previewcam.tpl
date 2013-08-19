{extends file="layout.tpl"}
{block name=layer1}

<img id="preview" src="http://127.0.0.1/raspistill.php?w=320&h=240&show=true" width="320" height="240" border="0" />

<script type="text/javascript">
	setInterval(function(){
	    $("#preview").attr("src", "http://127.0.0.1/raspistill.php?w=320&h=240&show=true&"+new Date().getTime());
	},4000);
</script>

{/block}
{block name=layer2}
Previewcam
{/block}