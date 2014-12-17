<div class="row">
    <div class="col-md-12">
        <div class="block-web full">
            <div class="col-md-12">
                <div class="block-web">
                    <div class="header">
                        <div class="actions"> <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a> <a href="#" class="refresh"><i class="fa fa-repeat"></i></a> </div>
                        <h3 class="content-header">Update Profile</h3>
                    </div>
                    <div class="porlets-content">

                        <div class="porlets-content">
                            <fieldset>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'changepassword-form',
                                    'enableAjaxValidation' => true,
                                    'clientOptions' => array(
                                        'validateOnSubmit' => true,
                                        'class' => 'form-horizontal row-border'
                                    ),
                                ));
                                ?>
                                <div class="porlets-content">
                                    <div class="alert alert-info"> 
                                        <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
                                            <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                                        <?php endif; ?>
                                        <?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?>

                                        <?php echo $form->errorSummary(array($model)); ?></div>
                                </div>
                                <div class="form-group" style="padding-top:  30px;">
                                    <?php echo $form->labelEx($model, 'oldPassword', array('class' => 'col-sm-4 control-label')); ?>
                                    <div class="col-sm-6">
                                        <?php echo $form->passwordField($model, 'oldPassword', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'oldPassword', array('style' => 'color:red;')); ?>
                                    </div>
                                </div><!--/form-group--> 
                                <div class="form-group"  style="padding-top:  30px;">
                                    <?php echo $form->labelEx($model, 'password', array('class' => 'col-sm-4 control-label')); ?>
                                    <div class="col-sm-6">
                                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'password', array('style' => 'color:red;')); ?>
                                    </div>
                                </div><!--/form-group--> 
                                <div class="form-group" style="padding-top:  30px;">
                                    <?php echo $form->labelEx($model, 'verifyPassword', array('class' => 'col-sm-4 control-label')); ?>
                                    <div class="col-sm-6">
                                        <?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'verifyPassword', array('style' => 'color:red;')); ?>
                                    </div>
                                </div><!--/form-group--> 
                            </fieldset>
                            <div class="bottom" style="margin-top: 30px;">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/user/profile" class="btn btn-default" >Cancel</a>
                            </div><!--/form-group-->
                            <!--</form>-->
                            <?php $this->endWidget(); ?>
                        </div><!--/porlets-content-->
                    </div><!--/block-web--> 
                </div><!--/col-md-6-->
            </div><!--/block-web--> 
        </div><!--/col-md-8--> 
    </div><!--/row--> 



    <?php
    /**
     * 

      $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
      $this->breadcrumbs = array(
      UserModule::t("Profile") => array('/user/profile'),
      UserModule::t("Change Password"),
      );
      $this->menu = array(
      ((UserModule::isAdmin()) ? array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')) : array()),
      array('label' => UserModule::t('List User'), 'url' => array('/user')),
      array('label' => UserModule::t('Profile'), 'url' => array('/user/profile')),
      array('label' => UserModule::t('Edit'), 'url' => array('edit')),
      array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
      );
      ?>

      <h1><?php echo UserModule::t("Change password"); ?></h1>

      <div class="form">
      <?php
      $form = $this->beginWidget('CActiveForm', array(
      'id' => 'changepassword-form',
      'enableAjaxValidation' => true,
      'clientOptions' => array(
      'validateOnSubmit' => true,
      ),
      ));
      ?>

      <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
      <?php echo $form->errorSummary($model); ?>

      <div class="row">
      <?php echo $form->labelEx($model, 'oldPassword'); ?>
      <?php echo $form->passwordField($model, 'oldPassword'); ?>
      <?php echo $form->error($model, 'oldPassword'); ?>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model, 'password'); ?>
      <?php echo $form->passwordField($model, 'password'); ?>
      <?php echo $form->error($model, 'password'); ?>
      <p class="hint">
      <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
      </p>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model, 'verifyPassword'); ?>
      <?php echo $form->passwordField($model, 'verifyPassword'); ?>
      <?php echo $form->error($model, 'verifyPassword'); ?>
      </div>


      <div class="row submit">
      <?php echo CHtml::submitButton(UserModule::t("Save")); ?>
      </div>

      <?php $this->endWidget(); ?>
      </div><!-- form -->
     * 
     */
    ?>