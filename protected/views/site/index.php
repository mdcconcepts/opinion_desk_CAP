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