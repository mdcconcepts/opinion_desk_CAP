<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_value')); ?>:</b>
	<?php echo CHtml::encode($data->option_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responce_text')); ?>:</b>
	<?php echo CHtml::encode($data->responce_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responce_audio_url')); ?>:</b>
	<?php echo CHtml::encode($data->responce_audio_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responce_vedio_url')); ?>:</b>
	<?php echo CHtml::encode($data->responce_vedio_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_id); ?>
	<br />

	*/ ?>

</div>