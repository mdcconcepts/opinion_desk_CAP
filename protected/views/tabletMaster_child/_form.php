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
<input style="display:none" class="span5" value="<?php echo $_GET['pId']; ?>" name="TabletMaster[branch_id]" id="TabletMaster_branch_id" type="text">
<div class="form-group">
    <?php echo $form->labelEx($model, 'first_name_user', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php echo $form->textFieldRow($model, 'first_name_user', array('class' => 'span5 form-control', 'maxlength' => 45)); ?>       
        <?php echo $form->error($model, 'first_name_user', array('style' => 'color:red;')); ?>
    </div>
</div><!--/form-group--> 
<div class="form-group">
    <?php echo $form->labelEx($model, 'last_name_user', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php echo $form->textFieldRow($model, 'last_name_user', array('class' => 'span5 form-control', 'maxlength' => 45)); ?>       
        <?php echo $form->error($model, 'last_name_user', array('style' => 'color:red;')); ?>
    </div>
</div><!--/form-group--> 
<div class="form-group">
    <?php echo $form->labelEx($model, 'username', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php echo $form->textFieldRow($model, 'username', array('class' => 'span5 form-control', 'maxlength' => 45)); ?>       
        <?php echo $form->error($model, 'username', array('style' => 'color:red;')); ?>
    </div>
</div><!--/form-group--> 
<div class="form-group">
    <?php echo $form->labelEx($model, 'password', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php echo $form->textFieldRow($model, 'password', array('class' => 'span5 form-control', 'maxlength' => 45)); ?>       
        <?php echo $form->error($model, 'password', array('style' => 'color:red;')); ?>
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
    <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/tabletMaster_child?pId=<?php echo $_GET['pId']; ?>" class="btn btn-default" >Cancel</a>
</div><!--/form-group-->
<!--</form>-->
<?php $this->endWidget(); ?>


<?php
/**
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
  <?php echo $form->textFieldRow($model, 'first_name_user', array('class' => 'span5', 'maxlength' => 45)); ?>
  <?php echo $form->textFieldRow($model, 'last_name_user', array('class' => 'span5', 'maxlength' => 45)); ?>
  <?php
  //echo $form->datepickerRow($model, 'joining_date', array(
  //    'options' => array(
  //        'language' => 'id',
  //        'format' => 'yyyy-mm-dd',
  //        'weekStart' => 1,
  //        'autoclose' => 'true',
  //        'keyboardNavigation' => true,
  //    ),
  //        ), array(
  //    'prepend' => '<i class="icon-calendar"></i>'
  //        )
  //);
  //;
  //
  ?>
  <?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 45)); ?>
  <?php echo $form->textFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 75)); ?>

  <input style="display:none" class="span5" value="<?php echo $pId; ?>" name="TabletMaster[branch_id]" id="TabletMaster_branch_id" type="text">


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
