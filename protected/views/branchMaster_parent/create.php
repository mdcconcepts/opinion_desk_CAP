<?php
/**
  /* @var $this BranchMaster_parentController */
/* @var $model BranchMaster */
/**
  $this->breadcrumbs = array(
  'Branch Masters' => array('index'),
  'Create',
  );

  $menu = array();
  require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_menu.php');
  $this->menu = array(
  array('label' => 'BranchMaster', 'url' => array('index'), 'icon' => 'fa fa-list-alt', 'items' => $menu)
  );
  ?>

  <?php

  $box = $this->beginWidget(
  'bootstrap.widgets.TbBox', array(
  'title' => 'Create Branch Masters',
  'headerIcon' => 'icon- fa fa-plus-circle',
  'headerButtons' => array(
  array(
  'class' => 'bootstrap.widgets.TbButtonGroup',
  'type' => 'success',
  // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
  'buttons' => $this->menu
  )
  )
  )
  );
  ?>

  <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
  <?php $this->endWidget(); ?>
 * 
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="block-web full">
            <div class="col-md-12">
                <div class="block-web">
                    <div class="header">
                        <div class="actions"> <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a> <a href="#" class="refresh"><i class="fa fa-repeat"></i></a> </div>
                        <h3 class="content-header">Create Branch</h3>
                    </div>
                    <!--                    <div class="porlets-content">
                                            <div class="alert alert-danger"> -->
                    <!--                        </div>
                                        </div>-->

                    <div class="porlets-content">
                        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
                    </div><!--/porlets-content-->
                </div><!--/block-web--> 
            </div><!--/col-md-6-->
        </div><!--/block-web--> 
    </div><!--/col-md-8--> 
</div><!--/row--> 
