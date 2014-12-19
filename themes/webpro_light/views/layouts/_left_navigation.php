<div class = "leftside-navigation">
    <div class = "sidebar-section sidebar-user clearfix">
        <div class = "sidebar-user-avatar"> <a href = "#"> <img alt = "avatar" src = "<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar1.jpg"> </div>
                <div class = "sidebar-user-name"><?php echo Yii::app()->user->name; ?></div>
                <div class = "sidebar-user-links"> <a title = "" data-placement = "bottom" data-toggle = "" href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/profile" data-original-title = "User"><i class = "fa fa-user"></i></a> <a title = "" data-placement = "bottom" data-toggle = "" href = "inbox.html" data-original-title = "Messages"><i class = "fa fa-envelope-o"></i></a> <a title = "" data-placement = "bottom" data-toggle = "" href = "lockscreen.html" data-original-title = "Logout"><i class = "fa fa-sign-out"></i></a> </div>
        </div>
        <ul id = "nav-accordion" class = "sidebar-menu">
            <li>
                <h3>Settings</h3>
            </li>
            <li> <a href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php" class = "active"> <i class = "fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
            <li> <a href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/branchMaster_parent"> <i class = "fa fa-dashboard"></i> <span>Manage Branch</span> </a> </li>
            <li> <a href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/customerCustomFieldAssignmentTable_Parent"> <i class = "fa fa-dashboard"></i> <span>Manage Customer Fields</span> </a> </li>

        </ul><!--/nav-accordion sidebar-menu-->
    </div><!--/leftside-navigation-->