<?php

class TabletMaster_childController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $menuCaption = "Sub Menu";
    public $layout = '//layouts/column2';
    public $pName = 'BranchMaster_parent'; //parent Model Class Name => Program
    public $pUrl = 'BranchMaster_parent'; //parent URL => pusdiklat/planning/program
    public $pId = 'branch_master_id'; //parent field ID => programId

    /**
     * @return array action filters
     */
//
//    public function filters() {
//        return array(
//            'rights - index, view',
//        );
//    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {

        if (isset($_GET['asModal'])) {
            $this->renderPartial('view', array(
                'model' => $this->loadModel($id),
            ));
        } else {

//            if (isset($_GET['pId']) and $_GET['pId'] > 0) {
            $pId = (int) $_GET['pId'];
            $this->render('view', array(
                'model' => $this->loadModel($id),
                'pName' => $this->pName,
                'pUrl' => $this->pUrl,
                'pId' => $pId,
            ));
//            } else {
//                $this->redirect(Yii::app()->createUrl($this->pUrl));
//            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        if (isset($_GET['pId']) and $_GET['pId'] > 0) {
            $pId = (int) $_GET['pId'];


            $model = new TabletMaster;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['TabletMaster'])) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $messageType = 'warning';
                    $message = "There are some errors ";
                    $model->attributes = $_POST['TabletMaster'];

                    $count = TabletMaster::model()->countByAttributes(array(
                        'branch_id' => $model->branch_id
                    ));



                    if ($count >= BranchMaster::getTablet_count($model->branch_id)) {
                        Yii::app()->user->setFlash('error', "<strong>Your limit for Tablets for this Branch is expired !</strong></br>Please upgrade your package, kindly contact to our support !");
//                echo json_encode("error");
                        $this->render('create', array(
                            'model' => $model,
                            'pName' => $this->pName,
                            'pUrl' => $this->pUrl,
                            'pId' => $pId,
                        ));
                        Yii::app()->end();
                    }

                    //$uploadFile=CUploadedFile::getInstance($model,'filename');
                    if ($model->save()) {
                        $messageType = 'success';
                        $message = "<strong>Well done!</strong> You successfully create data ";
                        /*
                          $model2 = TabletMaster::model()->findByPk($model->id);
                          if(!empty($uploadFile)) {
                          $extUploadFile = substr($uploadFile, strrpos($uploadFile, '.')+1);
                          if(!empty($uploadFile)) {
                          if($uploadFile->saveAs(Yii::app()->basePath.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'tabletmaster'.DIRECTORY_SEPARATOR.$model2->id.DIRECTORY_SEPARATOR.$model2->id.'.'.$extUploadFile)){
                          $model2->filename=$model2->id.'.'.$extUploadFile;
                          $model2->save();
                          $message .= 'and file uploded';
                          }
                          else{
                          $messageType = 'warning';
                          $message .= 'but file not uploded';
                          }
                          }
                          }
                         */
                        $transaction->commit();
                        Yii::app()->user->setFlash($messageType, $message);
                        $this->redirect(array('view', 'id' => $model->id, 'pId' => $pId));
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                    //$this->refresh();
                }
            }

            $this->render('create', array(
                'model' => $model,
                'pName' => $this->pName,
                'pUrl' => $this->pUrl,
                'pId' => $pId,
            ));
        } else {
            $this->redirect(Yii::app()->createUrl($this->pUrl));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

//        if (isset($_GET['pId']) and $_GET['pId'] > 0) {
        $pId = (int) $_GET['pId'];


        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TabletMaster'])) {
            $messageType = 'warning';
            $message = "There are some errors ";
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['TabletMaster'];
                $messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully update data ";

                /*
                  $uploadFile=CUploadedFile::getInstance($model,'filename');
                  if(!empty($uploadFile)) {
                  $extUploadFile = substr($uploadFile, strrpos($uploadFile, '.')+1);
                  if(!empty($uploadFile)) {
                  if($uploadFile->saveAs(Yii::app()->basePath.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'tabletmaster'.DIRECTORY_SEPARATOR.$model->id.DIRECTORY_SEPARATOR.$model->id.'.'.$extUploadFile)){
                  $model->filename=$model->id.'.'.$extUploadFile;
                  $message .= 'and file uploded';
                  }
                  else{
                  $messageType = 'warning';
                  $message .= 'but file not uploded';
                  }
                  }
                  }
                 */

                if ($model->save()) {
                    $transaction->commit();
                    Yii::app()->user->setFlash($messageType, $message);
                    $this->redirect(array('view', 'id' => $model->id));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                // $this->refresh(); 
            }

            $model->attributes = $_POST['TabletMaster'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'pName' => $this->pName,
            'pUrl' => $this->pUrl,
            'pId' => $pId,
        ));
//        }
//        else {
//            $this->redirect(Yii::app()->createUrl($this->pUrl));
//        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
//        if (Yii::app()->request->isPostRequest) {
        // we only allow deletion via POST request
        try {
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index', 'pId' => $_GET['pId']));
        } catch (Exception $exc) {
            Yii::app()->user->setFlash('error', "{$exc->getMessage()}");
        }
        $this->redirect(Yii::app()->request->baseUrl . '/index.php/tabletMaster_child?pId=' . $_GET['pId']);
//        } else
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /*
          $dataProvider=new CActiveDataProvider('TabletMaster');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         */

        if (isset($_GET['pId']) and $_GET['pId'] > 0) {
            $pId = (int) $_GET['pId'];


            $model = new TabletMaster('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['TabletMaster']))
                $model->attributes = $_GET['TabletMaster'];

            $this->render('index', array(
                'model' => $model,
                'pName' => $this->pName,
                'pUrl' => $this->pUrl,
                'pId' => $pId,
            ));
        }
        else {
            $this->redirect(Yii::app()->createUrl($this->pUrl));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        if (isset($_GET['pId']) and $_GET['pId'] > 0) {
            $pId = (int) $_GET['pId'];


            $model = new TabletMaster('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['TabletMaster']))
                $model->attributes = $_GET['TabletMaster'];

            $this->render('admin', array(
                'model' => $model,
                'pName' => $this->pName,
                'pUrl' => $this->pUrl,
                'pId' => $pId,
            ));
        }
        else {
            $this->redirect(Yii::app()->createUrl($this->pUrl));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TabletMaster the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TabletMaster::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TabletMaster $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tablet-master-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionExport() {
        $model = new TabletMaster;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['TabletMaster']))
            $model->attributes = $_POST['TabletMaster'];

        $exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'List of TabletMaster',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'id',
                'first_name_user',
                'last_name_user',
                'user_profile_image_url',
                'joining_date',
                'username',
                'password',
                'created_at',
                'update_at',
                'branch_id',
            ),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionImport() {

        $model = new TabletMaster;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TabletMaster'])) {
            if (!empty($_FILES)) {
                $tempFile = $_FILES['TabletMaster']['tmp_name']['fileImport'];
                $fileTypes = array('xls', 'xlsx'); // File extensions
                $fileParts = pathinfo($_FILES['TabletMaster']['name']['fileImport']);
                if (in_array(@$fileParts['extension'], $fileTypes)) {

                    Yii::import('ext.heart.excel.EHeartExcel', true);
                    EHeartExcel::init();
                    $inputFileType = PHPExcel_IOFactory::identify($tempFile);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($tempFile);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $baseRow = 2;
                    $inserted = 0;
                    $read_status = false;
                    while (!empty($sheetData[$baseRow]['A'])) {
                        $read_status = true;
                        //$id=  $sheetData[$baseRow]['A'];
                        $first_name_user = $sheetData[$baseRow]['B'];
                        $last_name_user = $sheetData[$baseRow]['C'];
                        $user_profile_image_url = $sheetData[$baseRow]['D'];
                        $joining_date = $sheetData[$baseRow]['E'];
                        $username = $sheetData[$baseRow]['F'];
                        $password = $sheetData[$baseRow]['G'];
                        $created_at = $sheetData[$baseRow]['H'];
                        $update_at = $sheetData[$baseRow]['I'];
                        $branch_id = $sheetData[$baseRow]['J'];

                        $model2 = new TabletMaster;
                        //$model2->id=  $id;
                        $model2->first_name_user = $first_name_user;
                        $model2->last_name_user = $last_name_user;
                        $model2->user_profile_image_url = $user_profile_image_url;
                        $model2->joining_date = $joining_date;
                        $model2->username = $username;
                        $model2->password = $password;
                        $model2->created_at = $created_at;
                        $model2->update_at = $update_at;
                        $model2->branch_id = $branch_id;

                        try {
                            if ($model2->save()) {
                                $inserted++;
                            }
                        } catch (Exception $e) {
                            Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                            //$this->refresh();
                        }
                        $baseRow++;
                    }
                    Yii::app()->user->setFlash('success', ($inserted) . ' row inserted');
                } else {
                    Yii::app()->user->setFlash('warning', 'Wrong file type (xlsx, xls, and ods only)');
                }
            }


            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->render('admin', array(
                'model' => $model,
            ));
        }
    }

    public function actionEditable() {
        Yii::import('bootstrap.widgets.TbEditableSaver');
        $es = new TbEditableSaver('TabletMaster');
        $es->update();
    }

    public function actions() {
        return array(
            'toggle' => array(
                'class' => 'bootstrap.actions.TbToggleAction',
                'modelName' => 'TabletMaster',
            )
        );
    }

    public function actionCalendar() {
        $model = new TabletMaster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TabletMaster']))
            $model->attributes = $_GET['TabletMaster'];
        $this->render('calendar', array(
            'model' => $model,
        ));
    }

    public function actionCalendarEvents() {
        $items = array();
        $model = TabletMaster::model()->findAll();
        foreach ($model as $value) {
            $items[] = array(
                'id' => $value->id,
                //'color'=>'#CC0000',
                //'allDay'=>true,
                'url' => '#',
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }

}
