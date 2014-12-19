<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This function is used for settiong relevent css according to functionality.
 *
 * @author mdcconcepts
 */
class AssetsHelperForCustomTemplate {

    public static function getCSSForController() {
        if (Yii::app()->controller->id == 'branchMaster_parent') {
            ?>
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
            <?php
        } elseif (Yii::app()->controller->id == 'questionMaster_Child') {
            ?>
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
            <?php
        } elseif (Yii::app()->controller->id == 'tabletMaster_child') {
            ?>
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
            <?php
        }
    }

    public static function getJSForController() {
        if (Yii::app()->controller->id == 'branchMaster_parent') {
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/jquery.dataTables.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/dynamic_table_init.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/edit-table/edit-table.js"></script>

            <script>
                jQuery(document).ready(function () {
                    EditableTable.init();
                    $('.Branch_master').dataTable({
                        "aaSorting": [[4, "desc"]]
                    });
                });
            </script>
            <?php
        } elseif (Yii::app()->controller->id == 'questionMaster_Child') {
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/jquery.dataTables.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/dynamic_table_init.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/edit-table/edit-table.js"></script>

            <script>
                jQuery(document).ready(function () {
                    EditableTable.init();
                    $('.question_master').dataTable({
                        "aaSorting": [[4, "desc"]]
                    });
                });
            </script>
            <?php
        } elseif (Yii::app()->controller->id == 'tabletMaster_child') {
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/jquery.dataTables.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/DT_bootstrap.js"></script> 
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/data-tables/dynamic_table_init.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/edit-table/edit-table.js"></script>

            <script>
                jQuery(document).ready(function () {
                    EditableTable.init();
                    $('.tablet_master').dataTable({
                        "aaSorting": [[4, "desc"]]
                    });
                });
            </script>
            <?php
        }
    }

}
