<?php
/* @var $this TabletMaster_childController */
/* @var $model TabletMaster */
/**
  $this->breadcrumbs = array(
  'Tablet Masters' => array('index'),
  'Create',
  );

  $menu = array();
  require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_menu.php');
  $this->menu = array(
  array('label' => 'TabletMaster', 'url' => array('index'), 'icon' => 'fa fa-list-alt', 'items' => $menu)
  );
  ?>

  <?php

  $box = $this->beginWidget(
  'bootstrap.widgets.TbBox', array(
  'title' => 'Create Tablet Masters',
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
  <?php

  $this->widget('bootstrap.widgets.TbAlert', array(
  'block' => false, // display a larger alert block?
  'fade' => true, // use transitions?
  'closeText' => '&times;', // close link text - if set to false, no close link is displayed
  'alerts' => array(// configurations per alert type
  'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), //success, info, warning, error or danger
  'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), //success, info, warning, error or danger
  'warning' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), //success, info, warning, error or danger
  'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), //success, info, warning, error or danger
  'danger' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), //success, info, warning, error or danger
  ),
  ));
  ?>
  <?php echo $this->renderPartial('_form', array('model' => $model, 'pId' => $pId)); ?>
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
                        <h3 class="content-header">Create Tablets</h3>
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
