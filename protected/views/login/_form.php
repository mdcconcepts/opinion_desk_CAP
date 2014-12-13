<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>256)); ?>
<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>256)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Login' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
