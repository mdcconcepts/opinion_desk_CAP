<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tablet-master-form',
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
<select name="TabletMaster[branch_id]" id="TabletMaster_branch_id">
    <?php BranchMaster::getBranchList($branch_id); ?>
</select>
<?php echo $form->textFieldRow($model, 'first_name_user', array('class' => 'span5', 'maxlength' => 45)); ?>
<?php echo $form->textFieldRow($model, 'last_name_user', array('class' => 'span5', 'maxlength' => 45)); ?>
<?php
echo $form->datepickerRow($model, 'joining_date', array(
    'options' => array(
        'language' => 'id',
        'format' => 'yyyy-mm-dd',
        'weekStart' => 1,
        'autoclose' => 'true',
        'keyboardNavigation' => true,
    ),
        ), array(
    'prepend' => '<i class="icon-calendar"></i>'
        )
);
;
?>
<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 45)); ?>
<?php echo $form->textFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 75)); ?>

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
