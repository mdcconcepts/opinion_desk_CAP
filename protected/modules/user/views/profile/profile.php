<div class="row">
    <div class="col-md-12">
        <h2>Profile</h2>
    </div><!--/col-md-12--> 
</div><!--/row-->

<div class="row">
    <div class="col-md-4">
        <div class="block-web">
            <div class="user-profile-sidebar">
                <div class="row">
                    <!--<div class="col-md-4"> <img alt="Avatar" class="img-circle" src="images/avatar1.jpg"> </div>-->
                    <div class="col-md-8">
                        <div class="user-identity">
                            <h4><strong><?php echo $profile->getAttribute('firstname') . ' ' . $profile->getAttribute('lastname'); ?></strong></h4>
                            <p><i class="fa fa-map-marker"></i> <?php echo $profile->getAttribute('address'); ?></p>
                            <p>Zipcode -<?php echo ' ' . $profile->getAttribute('zipcode'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-status-data">
                <div class="row">
                    <div class="col-md-4">
                        <h5><strong><?php
                                echo $count = BranchMaster::model()->countByAttributes(array(
                            'customer_id' => Yii::app()->user->id
                                ));
                                ?></strong> Branches</h5>
                    </div>
                    <div class="col-md-4">
                        <h5><strong><?php echo TabletMaster::getAllTablet_Count_User(); ?></strong> Question</h5>
                    </div>
                    <div class="col-md-4">
                        <h5><strong><?php echo QuestionMaster::getAllQuestion_Count_User(); ?></strong> Tablets</h5>
                    </div>
                </div>
            </div>
            <div class="user-button">
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/user/profile/edit" class="btn btn-primary btn-sm btn-block" ><i class="fa fa-gears"></i> Update Profile</a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo Yii::app()->request->getBaseUrl(); ?>/index.php/user/profile/changepassword" class="btn btn-primary btn-sm btn-block" ><i class="fa fa-lock"></i> Change Password</a>
                    </div>
                </div>
            </div>
            <h5>CONNECTION</h5>
            <div id="social"> <a title="Facebook" data-toggle="" href="#"> <span class="fa-stack fa-lg"> <i class="fa fa-circle facebook fa-stack-2x"></i> <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> </span> </a> <a title="Twitter" data-toggle="tooltip" href="#"> <span class="fa-stack fa-lg"> <i class="fa fa-circle twitter fa-stack-2x"></i> <i class="fa fa-twitter fa-stack-1x fa-inverse"></i> </span> </a> <a title="Google Plus" data-toggle="tooltip" href="#"> <span class="fa-stack fa-lg"> <i class="fa fa-circle gplus fa-stack-2x"></i> <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i> </span> </a> <a title="Tumblr" data-toggle="" href="#"> <span class="fa-stack fa-lg"> <i class="fa fa-circle tumblr fa-stack-2x"></i> <i class="fa fa-tumblr fa-stack-1x fa-inverse"></i> </span> </a> <a title="" data-toggle="" href="#" data-original-title="Linkedin"> <span class="fa-stack fa-lg"> <i class="fa fa-circle linkedin fa-stack-2x"></i> <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i> </span> </a> </div>
        </div><!--/block-web--> 
    </div><!--/col-md-4-->

    <div class="col-md-8">
        <div class="block-web full">
            <!--            <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a data-toggle="tab" href="#about"><i class="fa fa-user"></i> About</a></li>
                            <li><a data-toggle="tab" href="#edit-profile"><i class="fa fa-pencil"></i> Edit</a></li>
                            <li><a data-toggle="tab" href="#user-activities"><i class="fa fa-laptop"></i> Activities</a></li>
                            <li><a data-toggle="tab" href="#mymessage"><i class="fa fa-envelope"></i> Message</a></li>
                        </ul>-->

            <!--            <div class="tab-content"> 
                            <div id="about" class="tab-pane active animated fadeInRight">-->
            <div class="user-profile-content">

                <div class="row">
                    <div class="col-sm-6">
                        <h5><strong>ABOUT</strong> ME</h5>
                        <address>
                            <strong>Gender</strong><br>
                            <abbr title="Gender"><?php echo $profile->getAttribute('gender'); ?></abbr>
                        </address>
                        <address>
                            <strong>Date Of Birth</strong><br>
                            <abbr title="Date Of Birth"><?php echo $profile->getAttribute('dob'); ?></abbr>
                        </address>
                        <address>
                            <strong>Anniversary</strong><br>
                            <abbr title="Date Of Birth"><?php echo $profile->getAttribute('annivarsary'); ?></abbr>
                        </address>
                    </div>
                    <div class="col-sm-6">
                        <h5><strong>ABOUT</strong> My Business</h5>
                        <address>
                            <strong>Business Name</strong><br>
                            <abbr title="Business Name"><?php echo $profile->getAttribute('business_name'); ?></abbr>
                        </address>
                        <address>
                            <strong>Line Of Business</strong><br>

                            <abbr title="Line Of Business"><?php
                                echo LobMaster::model()->findAllByAttributes(
                                        array(
                                            'id' => $profile->getAttribute('lob')
                                        )
                                )[0]->lob_name;
                                ?></abbr>
                        </address>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h5><strong>CONTACT</strong> ME</h5>
                        <address>
                            <strong>Phone</strong><br>
                            <abbr title="Phone"><?php echo $profile->getAttribute('phone_no'); ?></abbr>
                        </address>
                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:<?php echo User::model()->findByPk(Yii::app()->user->id)->email; ?>"><?php echo User::model()->findByPk(Yii::app()->user->id)->email; ?></a>
                        </address>
                    </div>
                </div>
            </div>
            <!--</div>-->

            <!--                <div id="edit-profile" class="tab-pane animated fadeInRight">
                                <div class="user-profile-content">
                                    <form role="form">
                                    <div class="form-group">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" value="John Doe" id="FullName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" value="john" id="Username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="RePassword">Re-Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="AboutMe">About Me</label>
                                        <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
            
                            <div id="user-activities" class="tab-pane">
                                <ul class="media-list">
                                    <li class="media"> <a href="#">
                                            <p><strong>John Doe</strong> Uploaded a photo <strong>"DSC000254.jpg"</strong> <br>
                                                <i>2 minutes ago</i></p>
                                        </a> </li>
                                    <li class="media"> <a href="#">
                                            <p><strong>Imran Tahir</strong> Created an photo album <strong>"Indonesia Tourism"</strong> <br>
                                                <i>8 minutes ago</i></p>
                                        </a> </li>
                                    <li class="media"> <a href="#">
                                            <p><strong>Colin Munro</strong> Posted an article <strong>"London never ending Asia"</strong> <br>
                                                <i>an hour ago</i></p>
                                        </a> </li>
                                    <li class="media"> <a href="#">
                                            <p><strong>Corey Anderson</strong> Added 3 products <br>
                                                <i>3 hours ago</i></p>
                                        </a> </li>
                                    <li class="media"> <a href="#">
                                            <p><strong>Morne Morkel</strong> Send you a message <strong>"Lorem ipsum dolor..."</strong> <br>
                                                <i>12 hours ago</i></p>
                                        </a> </li>
                                    <li class="media"> <a href="#">
                                            <p><strong>Imran Tahir</strong> Updated his avatar <br>
                                                <i>Yesterday</i></p>
                                        </a> </li>
                                </ul>
                            </div>
                            <div id="mymessage" class="tab-pane">
                                <ul class="media-list">
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </li>
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">Tim Southee</a> <small>Yesterday at 04:00 AM</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                                        </div>
                                    </li>
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">Kane Williamson</a> <small>January 17, 2014 05:35 PM</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </li>
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">Lonwabo Tsotsobe</a> <small>January 17, 2014 05:35 PM</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </li>
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">Dale Steyn</a> <small>January 17, 2014 05:35 PM</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </li>
                                    <li class="media"> <a href="#" class="pull-left"> <img alt="Avatar" src="images/avatar.jpg" class="media-object"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>/tab-content -->
        </div><!--/block-web--> 
    </div><!--/col-md-8--> 
</div><!--/row--> 


<?php /**
  $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
  $this->breadcrumbs = array(
  UserModule::t("Profile"),
  );
  $this->menu = array(
  ((UserModule::isAdmin()) ? array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')) : array()),
  //    array('label' => UserModule::t('List User'), 'url' => array('/user')),
  array('label' => UserModule::t('Edit'), 'url' => array('edit')),
  array('label' => UserModule::t('Change password'), 'url' => array('changepassword')),
  array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
  );
  ?>
  <h1>
  <?php echo UserModule::t('Your profile'); ?>
  </h1>

  <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
  <div class="success">
  <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
  </div>
  <?php endif; ?>
  <table class="dataGrid">
  <tr>
  <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
  <td><?php echo CHtml::encode($model->username); ?></td>
  </tr>
  <?php
  $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
  if ($profileFields) {
  foreach ($profileFields as $field) {
  //echo "<pre>"; print_r($profile); die();

  if ($field->varname == 'lob') {
  ?>
  <tr>
  <th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
  <td>
  <?php
  $LobMaster = LobMaster::model()->findAllByAttributes(
  array(
  'id' => $profile->getAttribute($field->varname)
  )
  );
  foreach ($LobMaster as $Lob) {
  ec ho $Lob->lob_name;
  }
  //                        echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname))));
  ?>
  </td>
  </tr>
  <?php
  break;
  }
  ?>
  <tr>
  <th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
  <td><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?></td>
  </tr>
  <?php
  }//$profile->getAttribute($field->varname)
  }
  ?>
  <tr>
  <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
  <td><?php echo CHtml::encode($model->email); ?></td>
  </tr>
  <tr>
  <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
  <td><?php echo $model->create_at; ?></td>
  </tr>
  <tr>
  <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
  <td><?php echo $model->lastvisit_at; ?></td>
  </tr>
  <tr>
  <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
  <td><?php echo CHtml::encode(User::itemAlias("UserStatus", $model->status)); ?></td>
  </tr>
  </table>
 * 
 */ ?>
       