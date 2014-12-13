<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

			<?php echo $form->textFieldRow($model,'customer_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'branch_name',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'branch_address',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'tablet_no',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
