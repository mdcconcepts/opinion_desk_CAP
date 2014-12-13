<?php

class TabletMasterController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
//    public function filters() {
//        return array(
//            'rights - index, view',
//        );
//    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $branch_id) {



        if (!TabletMaster::checkForCorrenctOwner($id)) {
            $this->redirect(array('/tabletMaster'));
        }

        if (isset($_GET['asModal'])) {
            $this->renderPartial('view', array(
                'model' => $this->loadModel($id),
                'branch_id' => $branch_id
            ));
        } else {

            $this->render('view', array(
                'model' => $this->loadModel($id),
                'branch_id' => $branch_id
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($branch_id) {

        $model = new TabletMaster;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//        echo json_encode($_POST['TabletMaster']);
//        Yii::app()->end();
        if (isset($_POST['TabletMaster'])) {
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
                    'branch_id' => $branch_id
                ));
                Yii::app()->end();
            }

            $transaction = Yii::app()->db->beginTransaction();
            try {

                //$uploadFile=CUploadedFile::getInstance($model,'filename');
                if ($model->save()) {
                    $messageType = 'success';
                    $message = "<strong>Well done!</strong> You successfully create data ";
                    $transaction->commit();
                    Yii::app()->user->setFlash($messageType, $message);
                    $this->redirect(array('tabletMaster/view', 'id' => $model->tablet_id, 'branch_id' => $branch_id));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                //$this->refresh();
            }
        }

        $this->render('create', array(
            'model' => $model,
            'branch_id' => $branch_id
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $branch_id) {

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

                if ($model->save()) {
                    $transaction->commit();
                    Yii::app()->user->setFlash($messageType, $message);
                    $this->redirect(array('view', 'id' => $model->tablet_id, 'branch_id' => $branch_id));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                // $this->refresh(); 
            }

            $model->attributes = $_POST['TabletMaster'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->tablet_id, 'branch_id' => $branch_id));
        }

        $this->render('update', array(
            'model' => $model,
            'branch_id' => $branch_id
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again. ');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($branch_id) {

//        if (!isset($branch_id)) {
//            $this->redirect(array('branchMaster'));
//        }
//
//        echo $branch_id;
//
//
//        Yii::app()->end();
        /*
          $dataProvider=new CActiveDataProvider('TabletMaster');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         */

        $model = new TabletMaster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TabletMaster']))
            $model->attributes = $_GET['TabletMaster'];

        $this->render('index', array(
            'model' => $model,
            'branch_id' => $branch_id
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($branch_id) {

        $model = new TabletMaster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TabletMaster']))
            $model->attributes = $_GET['TabletMaster'];

        $this->render('admin', array(
            'model' => $model,
            'branch_id' => $branch_id
        ));
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
                'tablet_id',
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
                        //$tablet_id=  $sheetData[$baseRow]['A'];
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
                        //$model2->tablet_id=  $tablet_id;
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
                'id' => $value->tablet_id,
                //'color'=>'#CC0000',
                //'allDay'=>true,
                'url' => '#',
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }

}
