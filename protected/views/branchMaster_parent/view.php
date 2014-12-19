<div class="col-sm-4 col-lg-3">
    <ul class="nav nav-pills nav-stacked nav-email">
        <li class="active"> <a href="#"> <i class="glyphicon glyphicon-inbox"></i> Branch </a> </li>
        <li><a href="<?php echo Yii::app()->createUrl("questionMaster_Child?pId=" . $model->id); ?>"><i class="glyphicon glyphicon-star-empty"></i> Questions</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("tabletMaster_child?pId=" . $model->id); ?>"><i class="glyphicon glyphicon-phone"></i> Tablets </a></li>
        <li> <a href="<?php echo Yii::app()->createUrl("branchMaster_parent"); ?>"> <i class="glyphicon glyphicon-th-list"></i> View All Branch </a> </li>
    </ul>
</div><!-- col-sm-3 -->
<div class="col-sm-8 col-lg-8">
    <div class="block-web">
        <div class="pull-right">
            <div class="btn-group">
                <a href="<?php echo Yii::app()->createUrl("branchMaster_parent/update/" . $model->id); ?>" title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="<?php echo Yii::app()->createUrl("branchMaster_parent/delete/" . $model->id); ?>" title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
        </div> 

        <strong><?php echo $model->branch_name; ?></strong>
        <br/>
        <br/>
        <br/>
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'id',
                'customer_id',
                'branch_name',
                'branch_address',
                'tablet_no',
                'created_at',
                'updated_at',
            ),
        ));
        ?>
    </div><!--/ block-web --> 
</div><!-- /col-sm-9 --> 




<?php
/* @var $this BranchMaster_parentController */
/* @var $model BranchMaster */

/**
  $this->breadcrumbs = array(
  'Branch Masters' => array('index'),
  $model->id,
  );



  if (!isset($_GET['asModal'])) {
  ?>
  <?php
  $box = $this->beginWidget(
  'bootstrap.widgets.TbBox', array(
  'title' => 'View Branch Masters #' . $model->id,
  'headerIcon' => 'icon- fa fa-eye',
  'headerButtons' => array(
  array(
  'class' => 'bootstrap.widgets.TbButtonGroup',
  'type' => 'success',
  // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
  'buttons' => $menu2
  ),
  )
  )
  );
  ?>
  <?php
  }
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
  <?php
  $this->widget('bootstrap.widgets.TbDetailView', array(
  'data' => $model,
  'attributes' => array(
  'id',
  'customer_id',
  'branch_name',
  'branch_address',
  'tablet_no',
  'created_at',
  'updated_at',
  /*
  //CONTOH
  array(
  'header' => 'Level',
  'name'=> 'ref_level_id',
  'type'=>'raw',
  'value' => ($model->Level->name),
  // 'value' => ($model->status)?"on":"off",
  // 'value' => @Admin::model()->findByPk($model->createdBy)->username,
  ),

 */
/**   ),
  ));
  ?>

  <?php
  if (!isset($_GET['asModal'])) {
  $this->endWidget();
  }
  ?>
  <h2>Overview</h2>
  <h3>Report For Overall Period</h3>
  <p>How are your customer feel today?</p>
  <strong>Total Feedback : <b> <?php echo BranchDashboard_helper::getTotalFeedBackCountForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Total Average Feedback : <b> <?php echo BranchDashboard_helper::getTotalFeedBackAverageForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Total Positive Feedback : <b> <?php echo BranchDashboard_helper::getPositiveFeedbackForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Total Negative Feedback : <b> <?php echo BranchDashboard_helper::getNegativeFeedbackForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>

  <h3>Report For Customer Analysis</h3>

  <strong>Total Customer : <b> <?php echo BranchDashboard_helper::getTotalCustomerForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Total Male Customer: <b> <?php echo BranchDashboard_helper::getTotalMALECustomerForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Total female Customer : <b> <?php echo BranchDashboard_helper::getTotalFEMALECustomerForBranches('2013-08-29', '2015-08-29', $model->id); ?></b></strong>
  <br/>
  <strong>Customer Age Bounds</strong>
  <table style="border: 1px;">
  <tr>
  <th>
  Ageband
  </th>
  <th>
  Total Customer
  </th>
  </tr>

  <?php BranchDashboard_helper::getAgeBoundsForCustomerForBranches('2013-08-29', '2015-08-29', $model->id); ?>
  </table>
  <div  style="float: left;padding: 30px">
  <strong>Visitor Feedback Yearly</strong>
  <table style="border: 1px;">
  <tr>
  <th>
  year
  </th>
  <th>
  Total Visits
  </th>
  </tr>

  <?php BranchDashboard_helper::getYearlyReportForBranch($model->id); ?>
  </table>
  </div>
  <div  style="float: left;padding: 30px">
  <strong>Visitor Feedback Monthly</strong>
  <table style="border: 1px;">
  <tr>
  <th>
  Month
  </th>
  <th>
  Total Visits
  </th>
  </tr>

  <?php BranchDashboard_helper::getMonthlyReportForBranch($model->id); ?>
  </table>
  </div>
  <div  style="float: left;padding: 30px">
  <strong>Visitor Feedback Weekly</strong>
  <table style="border: 1px;">
  <tr>
  <th>
  Week
  </th>
  <th>
  Total Visits
  </th>
  </tr>

  <?php BranchDashboard_helper::getWeeklyReportForBranch($model->id); ?>
  </table>
  </div>
  <div style="clear: both;"></div>
  <div  style="padding: 30px">
  <strong>Category Wise Reports</strong>
  <table style="border: 1px;">
  <tr>
  <th>
  Category
  </th>
  <th>
  Total Count
  </th>
  </tr>

  <?php BranchDashboard_helper::getCategoryWiseReportForBranch($model->id); ?>
  </table>
  </div>
 * 
 */
?>

<?php
//$menu = array();
//require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_menu.php');
//
//$this->menu = array(
//    array('label' => 'View BranchMaster', 'url' => array('view', 'id' => $model->id), 'icon' => 'fa fa-eye', 'active' => true),
//    // Add child model
//    array('label' => 'Tablets', 'url' => Yii::app()->createUrl("tabletMaster_child?pId=" . $model->id), 'icon' => 'fa fa-mobile'),
//    array('label' => 'Questions', 'url' => Yii::app()->createUrl("QuestionMaster_Child?pId=" . $model->id), 'icon' => 'fa fa-list-alt'),
//        //    array('label' => 'Child Model 3', 'url' => Yii::app()->createUrl("'Child Model 3", array("pId" => $model->id)), 'icon' => 'fa fa-list-alt'),
//);
//
//
//$menu2 = array(
//    array('label' => 'BranchMaster', 'url' => array('index'), 'icon' => 'fa fa-list-alt', 'items' => $menu)
//);
?>

