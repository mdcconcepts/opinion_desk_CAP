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
<input style="display:none" class="span5" value="<?php echo $_GET['pId']; ?>" name="QuestionMaster[branch_id]" id="QuestionMaster_branch_id" type="text">
<div class="form-group">
    <?php echo $form->labelEx($model, 'option_type_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <select name="QuestionMaster[option_type_id]" id="QuestionMaster_option_type_id">
            <?php OptionType::getOptionTypes(); ?>
        </select>
        <?php echo $form->error($model, 'option_type_id', array('style' => 'color:red;')); ?>
    </div>
</div><!--/form-group--> 
<div class="form-group">
    <?php echo $form->labelEx($model, 'category_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <select name="QuestionMaster[category_id]" id="QuestionMaster_option_type_id">
            <?php CategoryMaster::getCategoryTypes(); ?>
        </select>
        <?php echo $form->error($model, 'category_id', array('style' => 'color:red;')); ?>
    </div>
</div><!--/form-group--> 
<div class="form-group">
    <?php // echo $form->labelEx($model, 'question', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-12">
        <?php echo $form->textAreaRow($model, 'question', array('class' => 'span5 form-control', 'maxlength' => 500)); ?>       
        <?php echo $form->error($model, 'question', array('style' => 'color:red;')); ?>
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
    <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/questionMaster_Child?pId=<?php echo $_GET['pId']; ?>" class="btn btn-default" >Cancel</a>
</div><!--/form-group-->
<!--</form>-->
<?php $this->endWidget(); ?>


<?php /**
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

 *
 * 
 */
?>