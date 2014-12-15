<?php

/**
 * This is the model class for table "sub_customer_custom_field_assignment".
 *
 * The followings are the available columns in table 'sub_customer_custom_field_assignment':
 * @property integer $id
 * @property string $value
 * @property integer $customer_custom_field_assignment_id
 */
class SubCustomerCustomFieldAssignment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sub_customer_custom_field_assignment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value, customer_custom_field_assignment_id', 'required'),
            array('customer_custom_field_assignment_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 45),
            /*
              //Example username
              array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
              'message'=>'Username can contain only alphanumeric
              characters and hyphens(-).'),
              array('username','unique'),
             */
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, value, customer_custom_field_assignment_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'sub_data_field' => array(self::BELONGS_TO, 'CustomerCustomFieldAssignmentTable', 'customer_custom_field_assignment_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'value' => 'Value',
            'customer_custom_field_assignment_id' => 'Customer Custom Field Assignment',
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
        $criteria->compare('value', $this->value, true);
        $criteria->compare('customer_custom_field_assignment_id', $this->customer_custom_field_assignment_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SubCustomerCustomFieldAssignment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $userId = 0;
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

    public function getDataFromPK($pId) {
        $criteria = new CDbCriteria;
        $criteria->condition = "customer_custom_field_assignment_id=" . $pId;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
