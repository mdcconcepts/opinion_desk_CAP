<?php

$currController = Yii::app()->controller->id;
$currControllers = explode('/', $currController);
$currAction = Yii::app()->controller->action->id;
$currRoute = Yii::app()->controller->getRoute();
$currRoutes = explode('/', $currRoute);

$menu = array();
if (in_array($currAction, array('index', 'view', 'create', 'update', 'admin', 'calendar', 'import')))
    $menu[] = array('label' => 'List TabletMaster', 'url' => array('?branch_id=' . $branch_id), 'icon' => 'fa fa-list-ol', 'active' => ($currAction == 'index') ? true : false);

if (in_array($currAction, array('index', 'view', 'create', 'update', 'admin', 'calendar', 'import')))
    $menu[] = array('label' => 'Create TabletMaster', 'url' => array('create?branch_id=' . $branch_id), 'icon' => 'fa fa-plus-circle', 'active' => ($currAction == 'create') ? true : false);

if (in_array($currAction, array('index', 'view', 'create', 'update', 'admin', 'calendar', 'import')))
    $menu[] = array('label' => 'Manage TabletMaster', 'url' => array('admin?branch_id=' . $branch_id), 'icon' => 'fa fa-tasks', 'active' => ($currAction == 'admin') ? true : false);
