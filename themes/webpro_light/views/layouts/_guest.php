<!DOCTYPE html>
<html lang="en">
    <?php require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/bootstrap-datepicker/css/datepicker.css" />
    <body>
        <!--        <div class="login-container">
                    <div class="middle-login">
                        <div class="block-web">
                            <div class="head">
                                <h3 class="text-center">WebPro - Admin</h3>
                            </div>
                            <div style="background:#fff;">
                                <form action="index.html" class="form-horizontal" style="margin-bottom: 0px !important;">
                                    <div class="content">
                                        <h4 class="title">Login Access</h4>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <a href="register.html"><button type="button" data-dismiss="modal" class="btn btn-default">Register</button></a>
                                        <a href="login.html"><button type="submit" data-dismiss="modal" class="btn btn-primary">Log in</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center out-links"><a href="#">&copy;  Copyright WebProAdmin 2014. </a></div>
                    </div>
                </div>-->
        <?php echo $content; ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.0.2.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/accordion.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common-script.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
        <script type="text/javascript">
            $('.default-date-picker').datepicker({
                format: 'yyyy-mm-dd'
            });
        </script>
    </body>
</html>
