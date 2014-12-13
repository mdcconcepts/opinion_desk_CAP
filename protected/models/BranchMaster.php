<?php

/**
 * This is the model class for table "branch_master".
 *
 * The followings are the available columns in table 'branch_master':
 * @property integer $id
 * @property integer $customer_id
 * @property string $branch_name
 * @property string $branch_address
 * @property integer $tablet_no
 * @property string $created_at
 * @property string $updated_at
 */
class BranchMaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'branch_master';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_id, branch_name, branch_address', 'required'),
            array('customer_id, tablet_no', 'numerical', 'integerOnly' => true),
            array('branch_name', 'length', 'max' => 45),
            array(' branch_address', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, customer_id, branch_name, branch_address, tablet_no, created_at, updated_at', 'safe', 'on' => 'search'),
            array('created_at', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('updated_at', 'default',
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
            'BranchMaster' => array(self::HAS_ONE, 'TabletMaster', 'id'),
            'BranchMaster' => array(self::HAS_MANY, 'QuestionMaster', 'branch_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'customer_id' => 'Customer',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'tablet_no' => 'Tablet Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('branch_name', $this->branch_name, true);
        $criteria->compare('branch_address', $this->branch_address, true);
        $criteria->compare('tablet_no', $this->tablet_no);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BranchMaster the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $userId = 0;
        if ($this->isNewRecord)
            $this->created_at = new CDbExpression('NOW()');

        $this->updated_at = new CDbExpression('NOW()');

        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

        if ($this->isNewRecord) {
            
        } else {
            
        }


        return parent::beforeSave();
    }

//    public function beforeDelete() {
//        $userId = 0;
//        if (null != Yii::app()->user->id)
//            $userId = (int) Yii::app()->user->id;
//
//        return false;
//    }

    public function getActiveUsers() {
        $criteria = new CDbCriteria;
        if (Yii::app()->user->name != "admin")
            $criteria->condition = "customer_id=" . Yii::app()->user->id;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function afterFind() {

        parent::afterFind();
    }

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

    public static function getBranchList($id) {
        $user_id = Yii::app()->user->id;
        $list = Yii::app()->db->createCommand('SELECT `id`,`branch_name` FROM `branch_master` WHERE `id`=' . $id)->queryAll();
        foreach ($list as $item) {
            echo '  <option value="' . $item['id'] . '">' . $item['branch_name'] . '</option>';
        }
    }

    public static function getTablet_count($id) {
        $list = Yii::app()->db->createCommand('SELECT `tablet_no` FROM `branch_master` WHERE `id`=' . $id)->queryAll();
        $Tablet_count = "";
        foreach ($list as $item) {
            $Tablet_count = $item['tablet_no'];
        }
        return $Tablet_count;
    }

}
