<?php

/**
 * This is the model class for table "tablet_master".
 *
 * The followings are the available columns in table 'tablet_master':
 * @property integer $id
 * @property string $first_name_user
 * @property string $last_name_user
 * @property string $user_profile_image_url
 * @property string $joining_date
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $update_at
 * @property integer $branch_id
 */
class TabletMaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tablet_master';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name_user, last_name_user, username, password, branch_id', 'required'),
            array('branch_id', 'numerical', 'integerOnly' => true),
            array('first_name_user, last_name_user, username', 'length', 'max' => 45),
            array('user_profile_image_url', 'length', 'max' => 100),
            array('password', 'length', 'max' => 75),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, first_name_user, last_name_user, user_profile_image_url, joining_date, username, password, created_at, update_at, branch_id', 'safe', 'on' => 'search'),
            array('created_at', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('update_at', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert')
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'TabletMaster' => array(self::HAS_ONE, 'BranchMaster', 'branch_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Tablet',
            'first_name_user' => 'First Name User',
            'last_name_user' => 'Last Name User',
            'user_profile_image_url' => 'User Profile Image Url',
            'joining_date' => 'Joining Date',
            'is_login' => 'is_login',
            'username' => 'Username',
            'password' => 'Password',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'branch_id' => 'Branch',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('first_name_user', $this->first_name_user, true);
        $criteria->compare('last_name_user', $this->last_name_user, true);
        $criteria->compare('user_profile_image_url', $this->user_profile_image_url, true);
        $criteria->compare('joining_date', $this->joining_date, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);
        $criteria->compare('branch_id', $this->branch_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TabletMaster the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $userId = 0;

        if ($this->isNewRecord)
            $this->created_at = new CDbExpression('NOW()');

        $this->update_at = new CDbExpression('NOW()');
        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

//        if ($this->isNewRecord) {
//            $this->password = $this->hashPassword($this->password);
//        } else {
//            if (!empty($this->password)) {
//                $this->password = $this->hashPassword($this->password);
//            }
//        }
        // NOT SURE RUN PLEASE HELP ME -> 
        //$from=DateTime::createFromFormat('d/m/Y',$this->joining_date);
        //$this->joining_date=$from->format('Y-m-d');

        return parent::beforeSave();
    }

//    public function beforeDelete() {
//        $userId = 0;
//        if (null != Yii::app()->user->id)
//            $userId = (int) Yii::app()->user->id;
//
//        return false;
//    }

    public function afterFind() {

        // NOT SURE RUN PLEASE HELP ME -> 
        //$from=DateTime::createFromFormat('Y-m-d',$this->joining_date);
        //$this->joining_date=$from->format('d/m/Y');

        parent::afterFind();
    }

//    /**
//     * Checks if the given password is correct.
//     * @param string the password to be validated
//     * @return boolean whether the password is valid
//     */
//    public function validatePassword($password) {
//        return CPasswordHelper::verifyPassword($password, $this->password);
//    }
//
//    /**
//     * Generates the password hash.
//     * @param string password
//     * @return string hash
//     */
//    public static function hashPassword($password) {
//        return CPasswordHelper::hashPassword($password);
//    }

    public function defaultScope() {
        /*
          //Example Scope
          return array(
          'condition'=>"deleted IS NULL ",
          'order'=>'create_time DESC',
          'limit'=>5,
          );
         */
        $scope = array();


        return $scope;
    }

    public function getActiveTablets($branch_id) {
        $criteria = new CDbCriteria;
        $User_id = Yii::app()->user->id;
        $list = Yii::app()->db->createCommand(
                        'SELECT `branch_id` FROM `branch_master` WHERE '
                        . '`branch_id`=' . $branch_id . ' AND `customer_id`=' . $User_id)->queryAll();
        $Tablet_count = "";
        if ($list) {
            $criteria->condition = "branch_id=" . $branch_id;
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        } else {
            false;
        }
    }

    public static function checkForCorrenctOwner($id) {
//        

        $User_id = Yii::app()->user->id;
        $list = Yii::app()->db->createCommand(
                        'SELECT `customer_id` FROM `branch_master` WHERE `branch_id` in '
                        . '(SELECT `branch_id` FROM `tablet_master` WHERE `id`=' . $id . ')'
                        . ' and `customer_id`=' . $User_id)->queryAll();
        $Tablet_count = "";
        if ($list) {
            return true;
        }
        return false;
    }

    public function getDataFromPK($pId) {
        $criteria = new CDbCriteria;
        $criteria->condition = "branch_id=" . $pId;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getAllTablet_Count_User() {
        $list = Yii::app()->db->createCommand('SELECT COUNT(*) As Total_Tablet_Count FROM `tablet_master` WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=' . Yii::app()->user->id . ')')->queryAll();
        $Tablet_count = "";
        foreach ($list as $item) {
            $Tablet_count = $item['Total_Tablet_Count'];
        }
        return $Tablet_count;
    }

}
