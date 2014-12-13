<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'tablet_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'first_name_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'last_name_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'user_profile_image_url',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->datepickerRow($model,'joining_date',
								array(
					                'options' => array(
					                    'language' => 'id',
					                    'format' => 'yyyy-mm-dd', 
					                    'weekStart'=> 1,
					                    'autoclose'=>'true',
					                    'keyboardNavigation'=>true,
					                ), 
					            ),
					            array(
					                'prepend' => '<i class="icon-calendar"></i>'
					            )
			);; ?>

		<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>

			<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_at',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'branch_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
