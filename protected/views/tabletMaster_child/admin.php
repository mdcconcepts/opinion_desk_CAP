<?php
/* @var $this TabletMaster_childController */
/* @var $model TabletMaster */

$this->breadcrumbs = array(
    'Branch List' => array('BranchMaster_parent/index'),
    'Branch - ' . $pId => array('BranchMaster_parent/' . $pId),
    'Branch Tablets' => array('index', 'pId' => $pId),
    'Manage',
);

$menu = array();
require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_menu.php');
$this->menu = array(
    array('label' => 'TabletMaster', 'url' => array('index'), 'icon' => 'fa fa-list-alt', 'items' => $menu)
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tablet-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
$box = $this->beginWidget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Manage Tablet Masters',
    'headerIcon' => 'icon- fa fa-tasks',
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'type' => 'success',
            // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'buttons' => $this->menu
        ),
    )
        )
);
?>		<?php
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
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php echo CHtml::beginForm(array('export')); ?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tablet-master-grid',
    'dataProvider' => $model->getDataFromPK($pId),
    'filter' => $model,
    'type' => 'striped hover', //bordered condensed
    'columns' => array(
        array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->currentPage*
					 $this->grid->dataProvider->pagination->pageSize
					)+ ($row+1)',
            'htmlOptions' => array('style' => 'width: 25px; text-align:center;'),
        ),
        array(
            'header' => 'Username',
            'name' => 'username',
            'type' => 'raw',
            'value' => '($data->username)',
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'editable' => array(
                'type' => 'textarea',
                'url' => $this->createUrl('editable'),
                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
            )
        ),
        array(
            'header' => 'password',
            'name' => 'password',
            'type' => 'raw',
            'value' => '($data->password)',
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'editable' => array(
                'type' => 'textarea',
                'url' => $this->createUrl('editable'),
                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
            )
        ),
        array(
            'header' => 'First_name_user',
            'name' => 'first_name_user',
            'type' => 'raw',
            'value' => '($data->first_name_user)',
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'editable' => array(
                'type' => 'textarea',
                'url' => $this->createUrl('editable'),
                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
            )
        ),
        array(
            'header' => 'Last_name_user',
            'name' => 'last_name_user',
            'type' => 'raw',
            'value' => '($data->last_name_user)',
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'editable' => array(
                'type' => 'textarea',
                'url' => $this->createUrl('editable'),
                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
            )
        ),
        array(
            'header' => 'Joining_date',
            'name' => 'joining_date',
            'type' => 'raw',
            'value' => '($data->joining_date)',
        ),
        //'password',
        array(
            'header' => 'Created_at',
            'name' => 'created_at',
            'type' => 'raw',
            'value' => '($data->created_at)',
        ),
        array(
            'header' => 'is_login',
            'name' => 'is_login',
            'type' => 'raw',
            'value' => '($data->is_login)',
        ),
        /*
          array(
          'header' => 'Update_at',
          'name'=> 'update_at',
          'type'=>'raw',
          'value' => '($data->update_at)',
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'headerHtmlOptions' => array('style' => 'text-align:center'),
          'editable' => array(
          'type'    => 'textarea',
          'url'     => $this->createUrl('editable'),
          'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
          )
          ),

         */
        /*
          array(
          'header' => 'Branch_id',
          'name'=> 'branch_id',
          'type'=>'raw',
          'value' => '($data->branch_id)',
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'headerHtmlOptions' => array('style' => 'text-align:center'),
          'editable' => array(
          'type'    => 'textarea',
          'url'     => $this->createUrl('editable'),
          'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
          )
          ),

         */
        /*
          //Contoh
          array(
          'header' => 'Level',
          'name'=> 'ref_level_id',
          'type'=>'raw',
          'value' => '($data->Level->name)',
          // 'value' => '($data->status)?"on":"off"',
          ),
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array
                (
                'view' => array
                    (
                    'url' => '$data->id."|".$data->first_name_user',
                    'click' => 'function(){
                		data=$(this).attr("href").split("|")
                		$("#myModalHeader").html(data[1]);
	        			$("#myModalBody").load("' . $this->createUrl('view') . '&id="+data[0]+"&asModal=true");
                		$("#myModal").modal();
                		return false;
                	}',
                ),
            )
        ),
    ),
));
?>

<select name="fileType" style="width:150px;">
    <option value="Excel5">EXCEL 5 (xls)</option>
    <option value="Excel2007">EXCEL 2007 (xlsx)</option>
    <option value="HTML">HTML</option>
    <option value="PDF">PDF</option>
    <option value="WORD">WORD (docx)</option>
</select>
<br>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit', 'icon' => 'fa fa-print', 'label' => 'Export', 'type' => 'primary'));
?>
<?php echo CHtml::endForm(); ?>
<?php
$box = $this->beginWidget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Import Data',
    'htmlOptions' => array('style' => 'width:25%; text-align:center;margin-top:-100px', 'class' => 'pull-right'),
        )
);
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'import-admin-form',
    'type' => 'inline',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
    'action' => $this->createUrl('import'), //<- your form action here
        ));
?>
<?php echo $form->fileFieldRow($model, 'fileImport'); ?> 
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Import',
    'icon' => 'fa fa-download'
));
?>
<br>
(file type permitted: xls, xlsx, ods only)
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>
<?php
$this->beginWidget(
        'bootstrap.widgets.TbModal', array('id' => 'myModal')
);
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 id="myModalHeader">Modal header</h4>
</div>

<div class="modal-body" id="myModalBody">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget(
            'bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
