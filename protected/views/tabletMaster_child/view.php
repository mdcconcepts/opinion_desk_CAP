<?php

/* @var $this TabletMaster_childController */
/* @var $model TabletMaster */

$this->breadcrumbs = array(
    'Branch List' => array('BranchMaster_parent/index'),
    'Branch - ' . $pId => array('BranchMaster_parent/' . $pId),
    'Branch Tablets' => array('index', 'pId' => $pId),
    $model->id,
);

$menu = array();
require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_menu.php');


$this->menu = array(
    array('label' => 'View TabletMaster', 'url' => array('view', 'id' => $model->id), 'icon' => 'fa fa-eye', 'active' => true),
        // Add child model
//	array('label'=>'Child Model 1','url'=>Yii::app()->createUrl("'Child Model 1", array("pId"=>$model->id)),'icon'=>'fa fa-list-alt'),
//	array('label'=>'Child Model 2','url'=>Yii::app()->createUrl("'Child Model 2", array("pId"=>$model->id)),'icon'=>'fa fa-list-alt'),
//	array('label'=>'Child Model 3','url'=>Yii::app()->createUrl("'Child Model 3", array("pId"=>$model->id)),'icon'=>'fa fa-list-alt'),
);

$menu2 = array(
    array('label' => 'TabletMaster', 'url' => array('index'), 'icon' => 'fa fa-list-alt', 'items' => $menu)
);

if (!isset($_GET['asModal'])) {
    ?>
    <?php

    $box = $this->beginWidget(
            'bootstrap.widgets.TbBox', array(
        'title' => 'View Tablet Masters #' . $model->id,
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
        'first_name_user',
        'last_name_user',
        'user_profile_image_url',
        'joining_date',
        'is_login',
        'username',
        'password',
        'created_at',
        'update_at',
        'branch_id',
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
    ),
));
?>

<?php

if (!isset($_GET['asModal'])) {
    $this->endWidget();
}
?>