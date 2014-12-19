<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'customer-custom-field-assignment-table-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        // 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        ));
?>

<div class="porlets-content">
    <div class="alert alert-info"> 

        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => false, // display a larger alert block?
            'fade' => true, // use transitions?
            'closeText' => '&times;', // close link text - if set to false, no close link is displayed
            'alerts' => array(// configurations per alert type
                'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;', 'class' => 'alert alert-danger'), //success, info, warning, error or danger
                'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;', 'class' => 'alert alert-danger'), //success, info, warning, error or danger
                'warning' => array('block' => true, 'fade' => true, 'closeText' => '&times;', 'class' => 'alert alert-danger'), //success, info, warning, error or danger
                'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;', 'class' => 'alert alert-danger'), //success, info, warning, error or danger
                'danger' => array('block' => true, 'fade' => true, 'closeText' => '&times;', 'class' => 'alert alert-danger'), //success, info, warning, error or danger
            ),
        ));
        ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    </div>
</div>
<input style="display:none" class="span5" value="<?php echo Yii::app()->user->id; ?>" name="CustomerCustomFieldAssignmentTable[user_id]" id="CustomerCustomFieldAssignmentTable_user_id" type="text">
<div class="form-group">
    <?php echo $form->labelEx($model, 'customer_custom_field_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php
        $LoB = Profile::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        $list = CHtml::listData(CustomerCustomField::model()->findAllByAttributes(array('lob_id' => $LoB)), 'id', 'field_name');
        echo $form->dropDownList($model, 'customer_custom_field_id', $list);
        ?>
    </div>
</div><!--/form-group--> 
<div class="bottom">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
    <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/customerCustomFieldAssignmentTable_Parent" class="btn btn-default" >Cancel</a>
</div><!--/form-group-->
<!--</form>-->
<?php $this->endWidget(); ?>
<?php
/**
  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
  'id' => 'customer-custom-field-assignment-table-form',
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

  <?php
  $LoB = Profile::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
  $list = CHtml::listData(CustomerCustomField::model()->findAllByAttributes(array('lob_id' => $LoB)), 'id', 'field_name');
  echo $form->dropDownList($model, 'customer_custom_field_id', $list);
  ?>
  <input style="display:none" class="span5" value="<?php echo Yii::app()->user->id; ?>" name="CustomerCustomFieldAssignmentTable[user_id]" id="CustomerCustomFieldAssignmentTable_user_id" type="text">


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
 * 
 */
?>
