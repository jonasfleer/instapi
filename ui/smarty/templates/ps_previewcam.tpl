{extends file="layout.tpl"}
{block name=body}

Previewcam

<img id="preview" src="http://192.168.178.71/raspistill.php?w=640&h=480&show=true" width="640" height="480" border="0" />

<script type="text/javascript">
	setInterval(function(){
	    $("#preview").attr("src", "http://192.168.178.71/raspistill.php?w=640&h=480&show=true&"+new Date().getTime());
	},2000);
</script>

{/block}