<?php

/**
 * This is the model class for table "responce_master".
 *
 * The followings are the available columns in table 'responce_master':
 * @property integer $id
 * @property double $option_value
 * @property string $responce_text
 * @property string $responce_audio_url
 * @property string $responce_vedio_url
 * @property string $created_at
 * @property integer $question_id
 * @property integer $client_id
 */
class ResponceMaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'responce_master';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('option_value, created_at, question_id, client_id', 'required'),
            array('question_id, client_id', 'numerical', 'integerOnly' => true),
            array('option_value', 'numerical'),
            array('responce_text', 'length', 'max' => 200),
            array('responce_audio_url, responce_vedio_url', 'length', 'max' => 45),
            /*
              //Example username
              array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
              'message'=>'Username can contain only alphanumeric
              characters and hyphens(-).'),
              array('username','unique'),
             */
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, option_value, responce_text, responce_audio_url, responce_vedio_url, created_at, question_id, client_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ResponceMaster' => array(self::HAS_ONE, 'QuestionMaster', 'question_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Responce',
            'option_value' => 'Option Value',
            'responce_text' => 'Responce Text',
            'responce_audio_url' => 'Responce Audio Url',
            'responce_vedio_url' => 'Responce Vedio Url',
            'created_at' => 'Created At',
            'question_id' => 'Question',
            'client_id' => 'Client',
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
        $criteria->compare('option_value', $this->option_value);
        $criteria->compare('responce_text', $this->responce_text, true);
        $criteria->compare('responce_audio_url', $this->responce_audio_url, true);
        $criteria->compare('responce_vedio_url', $this->responce_vedio_url, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('question_id', $this->question_id);
        $criteria->compare('client_id', $this->client_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ResponceMaster the static model class
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

    public function beforeDelete() {
        $userId = 0;
        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

        return false;
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

}
