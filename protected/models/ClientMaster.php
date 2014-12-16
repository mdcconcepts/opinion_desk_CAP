<?php

/**
 * This is the model class for table "client_master".
 *
 * The followings are the available columns in table 'client_master':
 * @property integer $client_id
 * @property string $name
 * @property string $mobile_no
 * @property integer $gender
 * @property string $dob
 * @property string $created_at
 */
class ClientMaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'client_master';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, mobile_no, gender, dob', 'required'),
            array('gender', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 45),
            array('mobile_no', 'length', 'max' => 11),
            array('created_at', 'safe'),
            array('client_id, name, mobile_no, gender, dob, created_at', 'safe', 'on' => 'search'),
            array('created_at', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'client_id' => 'Client',
            'name' => 'Name',
            'mobile_no' => 'Mobile No',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'created_at' => 'Created At',
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

        $criteria->compare('client_id', $this->client_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('mobile_no', $this->mobile_no, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('created_at', $this->created_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ClientMaster the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $userId = 0;
        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

        if ($this->isNewRecord) {
            $this->created_at = new CDbExpression('NOW()');
        } else {
            
        }


        // NOT SURE RUN PLEASE HELP ME -> 
        //$from=DateTime::createFromFormat('d/m/Y',$this->dob);
        //$this->dob=$from->format('Y-m-d');

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
        //$from=DateTime::createFromFormat('Y-m-d',$this->dob);
        //$this->dob=$from->format('d/m/Y');

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

}
