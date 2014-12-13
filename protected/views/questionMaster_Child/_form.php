<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'question-master-form',
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
<label for="QuestionMaster_option_type_id" class="required">Option Type <span class="required">*</span></label>
<select name="QuestionMaster[option_type_id]" id="QuestionMaster_option_type_id">
    <?php OptionType::getOptionTypes(); ?>
</select>
<br/>
<label for="QuestionMaster_category_id" class="required">Category <span class="required">*</span></label>
<select name="QuestionMaster[category_id]" id="QuestionMaster_category_id">
    <?php CategoryMaster::getCategoryTypes(); ?>
</select>
<?php echo $form->textAreaRow($model, 'question', array('class' => 'span5', 'maxlength' => 500)); ?>

<input style="display:none" class="span5" value="<?php echo $pId; ?>" name="QuestionMaster[branch_id]" id="QuestionMaster_branch_id" type="text">


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
