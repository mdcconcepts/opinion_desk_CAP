<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Dashboard_helper is used for providing support for Dashboard report functionality
 *
 * @author mdcconcepts
 */
class Dashboard_helper {

    //put your code here



    public static function getTotalFeedBackCountForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(`option_value`) AS Total_Feedback FROM "
                    . "`responce_master` WHERE `question_id` in (SELECT `id` FROM `question_master`"
                    . " WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Feedback'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getTotalFeedBackAverageForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT ROUND(AVG(`option_value`),2) AS Average_Ratting FROM "
                    . "`responce_master` WHERE `question_id` in (SELECT `id` FROM `question_master`"
                    . " WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))"
                    . " AND DATE(`created_at`) BETWEEN :from_Date AND :to_Date ";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
            $command->bindParam(':from_Date', $from_Date, PDO::PARAM_INT);
            $command->bindParam(':to_Date', $to_Date, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Average_Ratting'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getPositiveFeedbackForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(`option_value`) AS Total_Positive_Feedback FROM "
                    . "`responce_master` WHERE `question_id` in (SELECT `id` FROM `question_master`"
                    . " WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))"
                    . " AND `option_value`>2";


            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Positive_Feedback'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getNegativeFeedbackForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(`option_value`) AS Total_Negative_Feedback FROM "
                    . "`responce_master` WHERE `question_id` in (SELECT `id` FROM `question_master`"
                    . " WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))"
                    . " AND `option_value`<=2";


            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Negative_Feedback'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getTotalCustomerForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(DISTINCT `client_id`) AS Total_Customer FROM "
                    . "`responce_master` WHERE `question_id` in (SELECT `id` FROM `question_master`"
                    . " WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Customer'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getTotalMALECustomerForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(`gender`) AS Total_Male_Customer FROM `client_master` WHERE "
                    . "`client_id` in (SELECT `client_id` FROM `responce_master` "
                    . "WHERE `question_id` in (SELECT `id` FROM `question_master` "
                    . "WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE "
                    . "`customer_id`=:customer_id))) AND `gender`=1";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Male_Customer'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getTotalFEMALECustomerForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT COUNT(`gender`) AS Total_Male_Customer FROM `client_master` WHERE "
                    . "`client_id` in (SELECT `client_id` FROM `responce_master` "
                    . "WHERE `question_id` in (SELECT `id` FROM `question_master` "
                    . "WHERE `branch_id` in (SELECT `id` FROM `branch_master` WHERE "
                    . "`customer_id`=:customer_id))) AND `gender`=1";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                return $row['Total_Male_Customer'];
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

    public static function getAgeBoundsForCustomerForAllBranches($from_Date, $to_Date) {
        try {


            $connection = Yii::app()->db;

            $sqlStatement = "SELECT
                              CASE
                             WHEN age >= 0 AND age <= 18 THEN '0-18'
                              WHEN age >= 18 AND age <= 28 THEN '18-28'
                              WHEN age >=28 THEN '28+'
                            END AS ageband,
                            COUNT(*) As Total_customers
                            FROM (
                            SELECT DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(`dob`, '%Y') - 
                            (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(`dob`, '00-%m-%d')) 
                            AS age FROM `client_master` WHERE `client_id` IN 
                            (SELECT `client_id` FROM `responce_master` WHERE `question_id` in 
                            (SELECT `id` FROM `question_master` WHERE `branch_id` in 
                            (SELECT `id` FROM `branch_master` WHERE `customer_id`=:customer_id))))
                            AS TBL GROUP BY ageband";

            $command = $connection->createCommand($sqlStatement);

            $customer_id = Yii::app()->user->id;
            $command->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

            $command->execute();

            $reader = $command->query();

            foreach ($reader as $row) {
                echo '<tr>
                            <td>
                            ' . $row['ageband'] . '
                            </td>
                            <td>
                            ' . $row['Total_customers'] . '
                            </td>
                        </tr>';
            }
        } catch (Exception $ex) {
            return "error, " . $ex->getMessage();
        }

        return 0;
    }

}
