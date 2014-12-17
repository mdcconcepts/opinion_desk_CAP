<div class="login-container">
    <div class="middle-login">
        <div class="block-web">
            <div class="head">
                <h3 class="text-center">Opinion Desk</h3>
            </div>
            <div style="background:#fff;">

                <?php
                echo CHtml::beginForm(array('htmlOptions' => array('class' => 'form-horizontal')));
                ?>
                <!--<form action="/opinion_desk_cap/index.php/user/login" method="post"  class="form-horizontal" style="margin-bottom: 0px !important;">-->

                <div class="porlets-content">
                    <div class="alert alert-info">
                        <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
                            <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                        <?php endif; ?>

                        <?php echo CHtml::errorSummary($form); ?></div>
                </div>

                <div class="content">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <?php echo CHtml::activeTextField($form, 'login_or_email', array('class' => 'form-control', 'placeholder' => 'Email Address')) ?>
                                </div>
                                <div class="alert alert-info" style="margin: 10px;"><?php echo UserModule::t("Please enter your login or email addres."); ?></div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="foot">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/login"><button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button></a>
                    <input type="submit" name="yt1" class="btn btn-primary" value="Restore">
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
        </div>
        <div class="text-center out-links"><a href="#">&copy;  Copyright Opinion Desk 2014. </a></div>
    </div>
</div>
<h1><?php /* echo UserModule::t("Restore"); ?></h1>

                  <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
                  <div class="success">
                  <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                  </div>
                  <?php else: ?>

                  <div class="form">
                  <?php echo CHtml::beginForm(); ?>

                  <?php echo CHtml::errorSummary($form); ?>

                  <div class="row">
                  <?php echo CHtml::activeLabel($form, 'login_or_email'); ?>
                  <?php echo CHtml::activeTextField($form, 'login_or_email') ?>
                  <p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
                  </div>

                  <div class="row submit">
                  <?php echo CHtml::submitButton(UserModule::t("Restore")); ?>
                  </div>

                  <?php echo CHtml::endForm(); ?>
                  </div><!-- form -->
                  <?php endif;
                 */ ?>
 