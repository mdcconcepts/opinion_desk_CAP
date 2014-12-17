<div class="login-container">
    <div class="middle-login" style="top:30%;">
        <div class="block-web">
            <div class="head">
                <h3 class="text-center">Opinion Desk : Registration</h3>
            </div>
            <div style="background:#fff;">
                <?php echo CHtml::beginForm(); ?>
                <div class="porlets-content">
                    <div class="alert alert-danger">  
                        <?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?>
                        <?php echo CHtml::errorSummary($form); ?>
                    </div>
                </div>

                <div class="content" >
                    <fieldset>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-12 control-label"> <?php echo CHtml::activeLabelEx($form, 'password'); ?></label>
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <?php echo CHtml::activePasswordField($form, 'password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                                </div>
                                <p class="hint">
                                    <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-12 control-label"> <?php echo CHtml::activeLabelEx($form, 'verifyPassword'); ?></label>
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <?php echo CHtml::activePasswordField($form, 'verifyPassword', array('class' => 'form-control', 'placeholder' => 'Verify Password')); ?>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>

                <div class="register-bottom">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/login"><button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button></a>
                    <!--<a href="index.html"> <button class="btn btn-primary" data-dismiss="modal" type="submit">Register</button></a>-->
                    <input type="submit" class="btn btn-primary" name="yt0" value="Save">                 
                </div>
                <?php echo CHtml::endForm(); ?>

            </div>
        </div>
        <div class="text-center out-links"><a href="#">&copy;  Copyright WebProAdmin 2014. </a></div>
    </div>
</div>

<?php
/**
  $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
  $this->breadcrumbs = array(
  UserModule::t("Login") => array('/user/login'),
  UserModule::t("Change Password"),
  );
  ?>

  <h1><?php echo UserModule::t("Change Password"); ?></h1>


  <div class="form">
  <?php echo CHtml::beginForm(); ?>

  <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
  <?php echo CHtml::errorSummary($form); ?>

  <div class="row">
  <?php echo CHtml::activeLabelEx($form, 'password'); ?>
  <?php echo CHtml::activePasswordField($form, 'password'); ?>
  <p class="hint">
  <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
  </p>
  </div>

  <div class="row">
  <?php echo CHtml::activeLabelEx($form, 'verifyPassword'); ?>
  <?php echo CHtml::activePasswordField($form, 'verifyPassword'); ?>
  </div>


  <div class="row submit">
  <?php echo CHtml::submitButton(UserModule::t("Save")); ?>
  </div>

  <?php echo CHtml::endForm(); ?>
  </div><!-- form -->
 * 
 */?>