<div class="row">
    <div class="col-md-12">
        <div class="block-web full">
            <div class="col-md-12">
                <div class="block-web">
                    <div class="header">
                        <div class="actions"> <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a> <a href="#" class="refresh"><i class="fa fa-repeat"></i></a> </div>
                        <h3 class="content-header">Update Profile</h3>
                    </div>
                    <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
                        <div class="success">
                            <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="porlets-content">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'profile-form',
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array('enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal row-border'),
                        ));
                        ?>
                        <div class="porlets-content">
                            <div class="alert alert-info"> 
                                <?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?>

                                <?php echo $form->errorSummary(array($model, $profile)); ?></div>
                        </div>
                        <?php
                        $profileFields = $profile->getFields();
                        if ($profileFields) {
                            foreach ($profileFields as $field) {
                                if ($field->varname != "batch_count") {
                                    ?>
                                    <div class="form-group">
                                        <?php
                                        echo $form->labelEx($profile, $field->varname, array('class' => 'col-sm-3 control-label'));
                                        ?><div class = "col-sm-9">
                                        <?php
                                        if ($widgetEdit = $field->widgetEdit($profile)) {
                                            echo $widgetEdit;
                                        } elseif ($field->range) {
                                            echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                                        } elseif ($field->field_type == "TEXT") {
                                            echo $form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                                        } elseif ($field->varname == "dob") {
                                            ?>
                                                <input class="form-control form-control-inline input-medium default-date-picker" name="Profile[dob]" id="Profile_dob" type="text" placeholder="Birth Date" value="<?php echo $profile->dob; ?>" />
                    <!--                                                    echo '<input type="date" name="Profile[dob]" id="Profile_dob" >';-->
                                                <?php
                                            } elseif ($field->varname == "annivarsary") {
                                                ?>
                                                <input class="form-control form-control-inline input-medium default-date-picker" name="Profile[annivarsary]" id="Profile_annivarsary" placeholder="Anniversary"  type="text" value="<?php if ($profile->annivarsary != '0000-00-00') echo $profile->annivarsary; ?>" />
                                                <?php
                                            } elseif ($field->varname == "gender") {
                                                echo '<select name="Profile[gender]" id="Profile_gender">
                                                        <option value="male">male</option>
                                                        <option value="female">female</option>
                                                        <option value="other">other</option>
                                                    </select>';
                                            } elseif ($field->varname == "lob") {
                                                ?>
                                                <select name="Profile[lob]" id="lob_gender">
                                                    <?php LobMaster::getLOBTypes($profile->lob) ?>

                                                </select>
                                                <?php
                                            } else {
                                                echo $form->textField($profile, $field->varname, array('class' => 'form-control', 'placeholder' => $field->varname, 'size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                                            }

                                            echo $form->error($profile, $field->varname, array('class' => 'col-sm-3 control-label', 'style' => 'color:red;'));
                                            ?>
                                        </div>
                                        <?php
                                        ?>
                                    </div>	
                                    <?php
                                }
                            }
                        }
                        ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?>
                                <?php echo $form->error($model, 'email', array('style' => 'color:red;')); ?>
                            </div>
                        </div><!--/form-group--> 
                        <div class="bottom">
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



<?php /**
  $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
  $this->breadcrumbs = array(
  UserModule::t("Profile") => array('profile'),
  UserModule::t("Edit"),
  );
  $this->menu = array(
  ((UserModule::isAdmin()) ? array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')) : array()),
  //    array('label' => UserModule::t('List User'), 'url' => array('/user')),
  array('label' => UserModule::t('Profile'), 'url' => array('/user/profile')),
  array('label' => UserModule::t('Change password'), 'url' => array('changepassword')),
  array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
  );
  ?><h1><?php echo UserModule::t('Edit profile'); ?></h1>

  <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
  <div class="success">
  <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
  </div>
  <?php endif; ?>
  <div class="form">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
  'id' => 'profile-form',
  'enableAjaxValidation' => true,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
  ));
  ?>

  <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

  <?php echo $form->errorSummary(array($model, $profile)); ?>

  <?php
  $profileFields = $profile->getFields();
  if ($profileFields) {
  foreach ($profileFields as $field) {
  if ($field->varname != "batch_count") {
  ?>
  <div class="row">
  <?php
  echo $form->labelEx($profile, $field->varname);

  if ($widgetEdit = $field->widgetEdit($profile)) {
  echo $widgetEdit;
  } elseif ($field->range) {
  echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
  } elseif ($field->field_type == "TEXT") {
  echo $form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
  } elseif ($field->varname == "dob") {
  echo '<input type="date" name="Profile[dob]" id="Profile_dob" value="' . $profile->dob . '">';
  } elseif ($field->varname == "annivarsary") {
  echo '<input type="date" name="Profile[annivarsary]" id="Profile_annivarsary" value="' . $profile->annivarsary . '">';
  } elseif ($field->varname == "lob") {
  ?>
  <select name="Profile[lob]" id="lob_gender">
  <?php LobMaster::getLOBTypes($profile->lob) ?>

  </select>
  <?php
  } else {
  echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
  }
  echo $form->error($profile, $field->varname);
  ?>
  </div>
  <?php
  }
  }
  }
  ?>

  <div class="row">
  <?php echo $form->labelEx($model, 'email'); ?>
  <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
  <?php echo $form->error($model, 'email'); ?>
  </div>

  <div class="row buttons">
  <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
  </div>

  <?php $this->endWidget(); ?>

  </div><!-- form -->
 * *
 * 
 */
?>
                     