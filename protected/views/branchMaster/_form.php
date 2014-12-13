<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'branch-master-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        // 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<input style="display:none" class="span5" value="<?php echo Yii::app()->user->id; ?>" name="BranchMaster[customer_id]" id="BranchMaster_customer_id" type="text">
<?php echo $form->textFieldRow($model, 'branch_name', array('class' => 'span5', 'maxlength' => 45)); ?>
<?php echo $form->textFieldRow($model, 'branch_address', array('class' => 'span5', 'maxlength' => 45)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>