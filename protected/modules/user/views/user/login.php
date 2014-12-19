<div class="login-container">
    <div class="middle-login">
        <div class="block-web">
            <div class="head">
                <h3 class="text-center">Opinion Desk</h3>
            </div>
            <div style="background:#fff;">

                
                <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/login" method="post"  class="form-horizontal" style="margin-bottom: 0px !important;">

                    <div class="porlets-content">
                        <div class="alert alert-info">   <?php echo CHtml::errorSummary($model); ?></div>
                    </div>

                    <div class="content">
                        <h4 class="title">Login Access</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="UserLogin[username]" id="UserLogin_username" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" name="UserLogin[password]" id="UserLogin_password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::link(UserModule::t("Forgot Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
                    </div>
                    <div class="foot">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration"><button type="button" data-dismiss="modal" class="btn btn-default">Register</button></a>
                        <input type="submit" name="yt1" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center out-links"><a href="#">&copy;  Copyright Opinion Desk 2014. </a></div>
    </div>
</div>
<?php
/*
  $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
  $this->breadcrumbs = array(
  UserModule::t("Login"),
  );
  ?>

  <h1><?php echo UserModule::t("Login"); ?></h1>

  <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

  <div class="success">
  <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
  </div>

  <?php endif; ?>

  <p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

  <div class="form">
  <?php echo CHtml::beginForm(); ?>

  <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

  <?php echo CHtml::errorSummary($model); ?>

  <div class="row">
  <?php echo CHtml::activeLabelEx($model, 'username'); ?>
  <?php echo CHtml::activeTextField($model, 'username') ?>
  </div>

  <div class="row">
  <?php echo CHtml::activeLabelEx($model, 'password'); ?>
  <?php echo CHtml::activePasswordField($model, 'password') ?>
  </div>

  <div class="row">
  <p class="hint">
  <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
  </p>
  </div>

  <div class="row rememberMe">
  <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
  <?php echo CHtml::activeLabelEx($model, 'rememberMe'); ?>
  </div>

  <div class="row submit">
  <?php echo CHtml::submitButton(UserModule::t("Login")); ?>
  </div>

  <?php echo CHtml::endForm(); ?>
  </div><!-- form -->


  <?php
  $form = new CForm(array(
  'elements' => array(
  'username' => array(
  'type' => 'text',
  'maxlength' => 32,
  ),
  'password' => array(
  'type' => 'password',
  'maxlength' => 32,
  ),
  'rememberMe' => array(
  'type' => 'checkbox',
  )
  ),
  'buttons' => array(
  'login' => array(
  'type' => 'submit',
  'label' => 'Login',
  ),
  ),
  ), $model);
 * 
 */
?>