<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('option_value')); ?>:</b>
    <?php echo CHtml::encode($data->option_value); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
    <?php echo CHtml::encode($data->question_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
    <?php echo CHtml::encode($data->created_at); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
    <?php echo CHtml::encode($data->updated_at); ?>
    <br />


</div>