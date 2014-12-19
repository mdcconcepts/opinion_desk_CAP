<?php

class QuestionMaster_ChildController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $menuCaption = "Sub Menu";
    public $layout = '//layouts/column2';
    public $pName = 'BranchMaster'; //parent Model Class Name => Program
    public $pUrl = 'BranchMaster_parent'; //parent URL => pusdiklat/planning/program
    public $pId = 'branch_id'; //parent field ID => programId

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

        $this->layout = 'column2';

        if (isset($_GET['asModal'])) {
            $this->renderPartial('view', array(
                'model' => $this->loadModel($id),
                'pId' => QuestionMaster::model()->findByPk($id)->branch_id,
            ));
        } else {

            $this->render('view', array(
                'model' => $this->loadModel($id),
                'pId' => QuestionMaster::model()->findByPk($id)->branch_id,
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new QuestionMaster;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['QuestionMaster'])) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $messageType = 'warning';
                $message = "There are some errors ";
                $model->attributes = $_POST['QuestionMaster'];

                $count = QuestionMaster::model()->countByAttributes(array(
                    'branch_id' => $_GET['pId']
                ));



                if ($count >= 10) {
                    Yii::app()->user->setFlash('error', "<strong>Your limit for Questions for this Branch is expired !</strong></br> kindly contact to our support !");
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
                    $transaction->commit();
                    Yii::app()->user->setFlash($messageType, $message);
                    $this->redirect(array('view', 'id' => $model->id));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                //$this->refresh();
            }
        }

        $this->render('create', array(
            'model' => $model,
            'pId' => $_GET['pId'],
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $pId) {

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['QuestionMaster'])) {
            $messageType = 'warning';
            $message = "There are some errors ";
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['QuestionMaster'];
                $messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully update data ";

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

            $model->attributes = $_POST['QuestionMaster'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'pId' => $_GET['pId'],
        ));
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
        $this->redirect(Yii::app()->request->baseUrl . '/index.php/QuestionMaster_Child?pId=' . $_GET['pId']);
//        } else
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /*
          $dataProvider=new CActiveDataProvider('QuestionMaster');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         */

        if (isset($_GET['pId']) and $_GET['pId'] > 0) {
            $pId = (int) $_GET['pId'];


            $model = new QuestionMaster('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['QuestionMaster']))
                $model->attributes = $_GET['QuestionMaster'];

//            echo json_encode($model);
//            Yii::app()->end();

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

//        $model = new QuestionMaster('search');
//        $model->unsetAttributes();  // clear any default values
//        if (isset($_GET['QuestionMaster']))
//            $model->attributes = $_GET['QuestionMaster'];
//
//        $this->render('index', array(
//            'model' => $model,
//        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($pId) {

        $model = new QuestionMaster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['QuestionMaster']))
            $model->attributes = $_GET['QuestionMaster'];

        $this->render('admin', array(
            'model' => $model,
            'pId' => $pId,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return QuestionMaster the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = QuestionMaster::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param QuestionMaster $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'question-master-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionExport() {
        $model = new QuestionMaster;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['QuestionMaster']))
            $model->attributes = $_POST['QuestionMaster'];

        $exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'List of QuestionMaster',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'id',
                'question',
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

        $model = new QuestionMaster;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['QuestionMaster'])) {
            if (!empty($_FILES)) {
                $tempFile = $_FILES['QuestionMaster']['tmp_name']['fileImport'];
                $fileTypes = array('xls', 'xlsx'); // File extensions
                $fileParts = pathinfo($_FILES['QuestionMaster']['name']['fileImport']);
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
                        $question = $sheetData[$baseRow]['B'];
                        $created_at = $sheetData[$baseRow]['C'];
                        $update_at = $sheetData[$baseRow]['D'];
                        $branch_id = $sheetData[$baseRow]['E'];

                        $model2 = new QuestionMaster;
                        //$model2->id=  $id;
                        $model2->question = $question;
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
        $es = new TbEditableSaver('QuestionMaster');
        $es->update();
    }

    public function actions() {
        return array(
            'toggle' => array(
                'class' => 'bootstrap.actions.TbToggleAction',
                'modelName' => 'QuestionMaster',
            )
        );
    }

}
