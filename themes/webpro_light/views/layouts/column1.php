<?php /* @var $this Controller */ ?>
<?php
if (Yii::app()->user->isGuest) {
    $this->beginContent('//layouts/_guest');
} else {
    $this->beginContent('//layouts/main');
}
?>
<div id="content">
    <?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>