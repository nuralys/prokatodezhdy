<div class="title admin_t">Редактирование</div>
<div class="model_info">
<?php
echo $this->Form->create('Partner');
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model fl_r'));
if(!empty($data['Partner']['img'])){?>
	<img src="/img/partner/thumbs/<?=$data['Partner']['img']?>">
<?php 
}
?>
<div id="cropContainerEyecandyBack"></div>
 <link href="/css/main.css" rel="stylesheet">
    <link href="/css/croppic.css" rel="stylesheet">
   	<script src="/js/croppic.min.js"></script>
    <script>
		var croppicContainerEyecandyOptions = {
				uploadUrl:'/ajax/img_save_to_file.php',
				cropUrl:'/ajax/img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(data){ console.info(data);},
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(data){ console.info(data.url); console.info(data.urlsource);				
				$('.imgcrop').val(data.url);
				$('.imgsource').val(data.urlsource);
				},
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerEyecandyBack = new Croppic('cropContainerEyecandyBack', croppicContainerEyecandyOptions);

	</script>
<input type="text" name="data[Partner][imgsource]" class="imgsource" value="" />
<input type="text" name="data[Partner][imgcrop]" class="imgcrop" value="" />
<?
echo $this->Form->input('link', array('label' => 'Ссылка'));
?>
</div>
<?
echo $this->Form->end('Редактировать');
?>
<style type="text/css">
	.cropControls {
    z-index: 2;
    position: absolute;
    height: 30px;
    display: block;
    /* top: -31px; */
    width: 240px;
    top: -31px;
    right: -103px;
    font-family: sans-serif;
    background-color: rgba(0,0,0,0.35);
}
input#cropContainerEyecandyBack_imgUploadField {
    display: none;
}
#cropContainerEyecandyBack{
	margin-top: 35px;
}
</style>