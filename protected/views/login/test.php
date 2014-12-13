<a href="">Link</a>
<?php

echo CHtml::ajaxLink(
'Link ajax',
array('testajax'),
array('update'=>'#testid')
);

?>
<div id="testid">Ajax works</div>