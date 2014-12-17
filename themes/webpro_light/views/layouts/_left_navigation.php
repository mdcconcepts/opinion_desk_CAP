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
            <li> <a href = "#" class = "active"> <i class = "fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>

            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = "fa fa-book"></i> <span>UI Elements</span><b class = "badge bg-danger pull-right">10</b></a>
                <ul class = "sub">
                    <li><a href = "general.html"><i class = "fa fa-angle-right"></i> General</a></li>
                    <li><a href = "buttons.html"><i class = "fa fa-angle-right"></i> Buttons</a></li>
                    <li><a href = "slider.html"><i class = "fa fa-angle-right"></i> Slider</a></li>
                    <li><a href = "nestable.html"><i class = "fa fa-angle-right"></i> Nestable</a></li>
                    <li><a href = "grid.html"><i class = "fa fa-angle-right"></i> Grids</a></li>
                    <li><a href = "icons.html"><i class = "fa fa-angle-right"></i> Icons</a></li>
                    <li><a href = "tab-accordions.html"><i class = "fa fa-angle-right"></i> Tab & Accordions</a></li>
                    <li><a href = "calendar.html"><i class = "fa fa-angle-right"></i> Calender</a></li>
                    <li><a href = "porlets.html"><i class = "fa fa-angle-right"></i> Portlets</a></li>
                    <li><a href = "invoice.html"><i class = "fa fa-angle-right"></i> Invoice</a></li>
                    <li><a href = "treeview.html"><i class = "fa fa-angle-right"></i> Treeview</a></li>
                    <li><a href = "address-book.html"><i class = "fa fa-angle-right"></i> Address Book</a></li>
                </ul>
            </li>
            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = "fa fa-th"></i> <span>Tables</span><b class = "badge bg-danger pull-right">2</b></a>
                <ul class = "sub">
                    <li><a href = "basic-tables.html"><i class = "fa fa-angle-right"></i> Basic Table</a></li>
                    <li><a href = "data-tables.html"><i class = "fa fa-angle-right"></i> Data Table</a></li>
                </ul>
            </li>
            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = "fa fa-tasks"></i> <span>Form Components</span><b class = "badge bg-danger pull-right">7</b></a>
                <ul class = "sub">
                    <li><a href = "form-elements.html"><i class = "fa fa-angle-right"></i>Form Elements</a></li>
                    <li><a href = "form-validation.html"><i class = "fa fa-angle-right"></i>Form Validation</a></li>
                    <li><a href = "file-upload.html"><i class = "fa fa-angle-right"></i>Multiple File Upload</a></li>
                    <li><a href = "x-editable.html"><i class = "fa fa-angle-right"></i>X-Editable</a></li>
                </ul>
            </li>
            <li>
                <h3>Management</h3>
            </li>
            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = "fa fa-envelope"></i> <span>Mail </span><b class = "badge bg-danger pull-right">3</b></a>
                <ul class = "sub">
                    <li><a href = "inbox.html"><i class = "fa fa-angle-right"></i> Inbox</a></li>
                    <li><a href = "compose-mail.html"><i class = "fa fa-angle-right"></i> Compose Mail</a></li>
                    <li><a href = "read.html"><i class = "fa fa-angle-right"></i> View Mail</a></li>
                </ul>
            </li>
            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = " fa fa-bar-chart-o"></i> <span>Charts</span></span></a>
                <ul class = "sub">
                    <li><a href = "morris-charts.html"><i class = "fa fa-angle-right"></i> Morris</a></li>
                    <li><a href = "graph.html"><i class = "fa fa-angle-right"></i> Graph</a></li>
                    <li><a href = "float-chart.html"><i class = "fa fa-angle-right"></i> Float Charts</a></li>
                </ul>
            </li>

            <li> <a href = "gallery.html"> <i class = "fa fa-film"></i> <span>Gallery</span> </a> </li>
            <li class = "sub-menu dcjq-parent-li"> <a href = "javascript:;" class = "dcjq-parent"> <i class = "fa fa-glass"></i> <span>Extra</span><b class = "badge bg-danger pull-right">5</b></a>
                <ul class = "sub">
                    <li><a href = "profile.html"><i class = "fa fa-angle-right"></i> Profile</a></li>
                    <li><a href = "timeline.html"><i class = "fa fa-angle-right"></i> Timeline</a></li>
                    <li><a href = "blank-page.html"><i class = "fa fa-angle-right"></i> Blank Page</a></li>
                    <li><a href = "lockscreen.html"><i class = "fa fa-angle-right"></i>Lock Screen</a></li>
                    <li><a href = "error-404.html"><i class = "fa fa-angle-right"></i> Error-404</a></li>
                    <li><a href = "login.html"><i class = "fa fa-angle-right"></i> Login</a></li>
                </ul>
            </li>
        </ul><!--/nav-accordion sidebar-menu-->
    </div><!--/leftside-navigation-->