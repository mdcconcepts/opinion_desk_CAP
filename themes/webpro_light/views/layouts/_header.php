<div class = "header navbar navbar-inverse box-shadow navbar-fixed-top">
    <div class = "navbar-inner">
        <div class = "header-seperation">
            <ul class = "nav navbar-nav">
                <li class = "sidebar-toggle-box"> <a href = "#"><i class = "fa fa-bars"></i></a> </li>
                <li> <a href = "index.html"><strong>WebPro</strong></a> </li>
                <li class = "hidden-xs"> <a href = "#"><i class = "fa fa-angle-double-left"></i> Go to the front page</a> </li>
                <li class = "hidden-xs">
                    <div class = "hov">
                        <div class = "btn-group"> <a data-toggle = "dropdown" href = "" class = "con"><span class = "fa fa-bell"></span><span class = "label label-danger">33</span></a>
                            <ul role = "menu" class = "dropdown-menu pull-right dropdown-alerts">
                                <li class = "title"><span class = "icon icon-bell"></span>&nbsp;
                                    &nbsp;
                                    There are 5 new alerts in the system...</li>
                                <li class = "alert">
                                    <div class = "alert-icon alt-default"><span class = "fa fa-check-square"></span></div>
                                    <div class = "alert-content">Quality check was successful</div>
                                    <div class = "alert-time">32 sec ago</div>
                                </li>
                                <li class = "alert">
                                    <div class = "alert-icon alt-primary"><span class = "fa fa-plus-square"></span></div>
                                    <div class = "alert-content">New user added (John Doe)</div>
                                    <div class = "alert-time">11 min ago</div>
                                </li>
                                <li class = "alert">
                                    <div class = "alert-icon alt-warning"><span class = "fa fa-pencil-square"></span></div>
                                    <div class = "alert-content">User profile updated (John Doe)</div>
                                    <div class = "alert-time">3 hours ago</div>
                                </li>
                                <li class = "alert" style = "position:relative;">
                                    <div class = "alert-icon alt-danger"><span class = "fa fa-warning"></span></div>
                                    <div class = "alert-content">System failure reported</div>
                                    <div class = "alert-time">2 days ago</div>
                                </li>
                            </ul>
                        </div>
                        <div class = "btn-group"> <a data-toggle = "dropdown" href = "" class = "con"><span class = "fa fa-envelope"></span><span class = "label label-success">7</span></a>
                            <ul role = "menu" class = "dropdown-menu pull-right dropdown-messages">
                                <li class = "title"><span class = "fa fa-envelope"></span>&nbsp;
                                    &nbsp;
                                    You have 13 new messages to read...</li>
                                <li class = "message">
                                    <div class = "message-icon"><img src = "<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar2.jpg"></div>
                                    <div class = "message-content"><a href = "#">John Doe</a> <br>
                                        Lorem ipsum dolor sit amet...</div>
                                    <div class = "message-time">32 sec ago</div>
                                </li>
                                <li class = "message">
                                    <div class = "message-icon"><img src = "<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar2.jpg"></div>
                                    <div class = "message-content"><a href = "#">John Doe</a> <br>
                                        Quisque commodo sed ipsum...</div>
                                    <div class = "message-time">11 min ago</div>
                                </li>
                                <li class = "message">
                                    <div class = "message-icon"><img src = "<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar2.jpg"></div>
                                    <div class = "message-content"><a href = "#">John Doe</a> <br>
                                        Consectetur adipiscing elit...</div>
                                    <div class = "message-time">3 hours ago</div>
                                </li>
                                <li class = "message" style = "position:relative;">
                                    <div class = "message-icon"><img src = "<?php echo Yii::app()->theme->baseUrl; ?>/images/avatar2.jpg"></div>
                                    <div class = "message-content"><a href = "#">John Doe</a><br>
                                        Quisque commodo sed ipsum...</div>
                                    <div class = "message-time">2 days ago</div>
                                </li>
                            </ul>
                        </div>
                        <div class = "btn-group"> <a data-toggle = "dropdown" href = "" class = "con"><span class = "fa fa-user"></span><span class = "label label-primary">+5</span></a>
                            <ul role = "menu" class = "dropdown-menu pull-right dropdown-profile">
                                <li class = "title"><span class = "icon icon-user"></span>&nbsp;
                                    &nbsp;
                                    Welcome, John!</li>
                                <li><a href = "#"><span class = "fa fa-gears"></span>Settings</a></li>
                                <li><a href = "#"><span class = "fa fa-user"></span>Profile</a></li>
                                <li><a href = "#"><span class = "fa fa-envelope"></span>Messages</a></li>
                                <li><a href = "#"><span class = "fa fa-power-off"></span>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class = "hidden-xs"> <form method = "post" action = "index.html" class = "searchform"><input type = "text" placeholder = "Search here..." name = "keyword" class = "form-control"></form> </li>
                <li id = "last-one"> <a href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/logout">Log Out <i class = "fa fa-angle-double-right"></i></a> </li>
                <li><a id = "show-right-info-bar" href = "javascript:;" class = ""><i class = "fa fa-bars"></i></a></li>
            </ul><!--/nav navbar-nav-->
        </div><!--/header-seperation-->
    </div><!--/navbar-inner-->
</div><!--/header-->
