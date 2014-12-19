
<div class="row">
    <div class="col-md-12">
        <h2><i class="fa fa-dashboard"></i> Dashboard</h2>
    </div><!--/col-md-12--> 
</div><!--/row--> 

<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <h3 class="content-header"> How your <strong>customers</strong> are felling today?
                <div data-toggle="buttons" class="button-group pull-right"> <a class="btn active small border-gray right-margin" href="javascript:;"> <span class="button-content">
                            <input type="radio" name="radio-toggle-1">
                            Today </span> </a> <a class="btn small border-gray" href="javascript:;"> <span class="button-content">
                            <input type="radio" name="radio-toggle-1">
                            Monthly </span> </a> </div>
            </h3>
            <table class="table margin-top-20" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="fa-border"><button class="btn btn-danger padd-adj" type="button">12</button>
                        Total Feedback</td>
                    <td class="fa-border"><button class="btn btn-primary padd-adj" type="button">28</button>
                        Average Ratting</td>
                    <td class="fa-border"><button class="btn btn-info padd-adj" type="button">15</button>
                        Positive Ratting</td>
                    <td class="fa-border"><button class="btn btn-info padd-adj" type="button">15</button>
                        Negative Ratting</td>
                </tr>
            </table>
        </div>
    </div>
</div><!--/row-->

<div class="row">
    <div class="col-md-3">
        <div class="panel">
            <div class="weather-bg">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6"> <i class="fa fa-users"></i> Your Customers </div>
                        <div class="col-xs-6">
                            <div class="degree"> 34 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/panel-->
    </div><!--/col-md-3-->
    <div class="col-md-9">
        <div class="block-web">
            <div class="header">
                <h3 class="content-header">Customer Stats</h3>
            </div>
            <div class="porlets-content margin-top-20">
                <div class="knob-content-box">
                    <h4><strong>Have 100,000 Users</strong></h4>
                    <br>
                    <small>Estimated time 3 months</small></div>
                <div class="knob-box">
                    <input type="text" class="dial" value="42%" data-angleoffset="-125" data-anglearc="250" data-width="140" data-fgcolor="#e74949" data-thickness=".15" />
                </div>
                <div class="knob-content-box">
                    <h4><strong>Lower bounce rate to 10%</strong></h4>
                    <br>
                    <small>Estimated time 3 months</small> </div>
                <div class="knob-box">
                    <input type="text" class="dial" data-cursor="true" value="12%" data-width="140" data-fgcolor="#ffa200" data-thickness=".15" />
                </div>
            </div>
            <div class="bottom">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><strong class="bottom-content-box">Today</strong>
                            <div class="progress progress-hieght">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> 60% </div>
                            </div>
                            <strong class="bottom-content-box">Yesterday</strong>
                            <div class="progress progress-hieght">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"> 40% </div>
                            </div></td>
                        <td width="20%"></td>
                        <td><strong class="bottom-content-box">Today</strong>
                            <div class="progress progress-hieght">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"> 80% </div>
                            </div>
                            <strong class="bottom-content-box">Yesterday</strong>
                            <div class="progress progress-hieght">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"> 30% </div>
                            </div></td>
                    </tr>
                </table>
            </div><!--/bottom-->
        </div><!--/block-web-->
    </div><!--/col-md-6-->
</div><!--/row-->
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
<?php
//$field_category_name = SubCustomerCustomFieldAssignment::model()->findAllByAttributes(array('customer_custom_field_assignment_id' =>  3));
//
//echo json_encode(var_dump($field_category_name));
//$customercustomfield = CustomerCustomField::model()->findByPk(1);
//
//echo $field_category_name = $customercustomfield->Field_Category->field_category;
//
//echo '<br/>';
//echo $field_category_name = $customercustomfield->field_name;
//
//$customer_custom_field_assignment = CustomerCustomFieldAssignmentTable::model()->findByPk(1);
//echo $customer_custom_field = $customer_custom_field_assignment->Customer_Custom_Fields->Field_Category->field_category;
?>
<h2>Overview</h2>
<h3>Report For Overall Period</h3>
<p>How are your customer feel today?</p>
<strong>Total Feedback : <b> <?php echo Dashboard_helper::getTotalFeedBackCountForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
<br/>
<strong>Total Average Feedback : <b> <?php echo Dashboard_helper::getTotalFeedBackAverageForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
<br/>
<strong>Total Positive Feedback : <b> <?php echo Dashboard_helper::getPositiveFeedbackForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
<br/>
<strong>Total Negative Feedback : <b> <?php echo Dashboard_helper::getNegativeFeedbackForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>

<h3>Report For Customer Analysis</h3>

<strong>Total Customer : <b> <?php echo Dashboard_helper::getTotalCustomerForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
<br/>
<strong>Total Male Customer: <b> <?php echo Dashboard_helper::getTotalMALECustomerForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
<br/>
<strong>Total female Customer : <b> <?php echo Dashboard_helper::getTotalFEMALECustomerForAllBranches('2013-08-29', '2015-08-29'); ?></b></strong>
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

    <?php Dashboard_helper::getAgeBoundsForCustomerForAllBranches('2013-08-29', '2015-08-29'); ?>
</table>

?>
