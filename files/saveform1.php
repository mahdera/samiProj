<?php
    require_once 'form1.php';
    require_once 'form1q3.php';
    require_once 'form1q4.php';
    
    $title = $_POST['title'];
    $form_date = $_POST['formDate'];
    //$formattedDate = DATE_FORMAT($form_date,'%Y-%m-%d') this should be in MySQL
    //Mahder, use a manual date formatting just as you have used in the case of ethstar...
    $selectedDate = $_POST['selectedDate'];
    $selectedMonth = $_POST['selectedMonth'];
    $selectedYear = $_POST['selectedYear'];
    $plan = $_POST['plan'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3NumItems = $_POST['q3NumItems'];
    $q4NumItems = $_POST['q4NumItems'];
    //now create a MySQL compatable date variable.
    if($selectedDate < 10){
        $selectedDate = "0" . $selectedDate;    
    }
    if($selectedMonth < 10){
        $selectedMonth = "0" . $selectedMonth;
    }
    $mysqlFormDate = $selectedYear+"-"+$selectedMonth+"-"+$selectedDate;
    
    //now save form1 record to the database
    saveForm1($title, $mysqlFormDate, $plan, $q1, $q2);
    //now fetch this particular record using the column/field values...
    $form1Obj = getForm1Using($title, $form_date);
    
    if($form1Obj != null){
        $form1Id = $form1Obj->id;
        
        for($i=1; $i <= $q3NumItems; $i++){
            $textBoxQ3Col1 = "txtrowq3" . $i;
            $textBoxQ3Col2 = "txtrowq3" . ($i+1);
            $textBoxQ3Col3 = "txtrowq3" . ($i+2);
            $textBoxQ3Col4 = "txtrowq3" . ($i+3);
            $textBoxQ3Col5 = "txtrowq3" . ($i+4);
            $textBoxQ3Col6 = "txtrowq3" . ($i+5);            
            //now get the values...
            $textBoxQ3Col1Value = $_POST["$textBoxQ3Col1"];
            $textBoxQ3Col2Value = $_POST["$textBoxQ3Col2"];
            $textBoxQ3Col3Value = $_POST["$textBoxQ3Col3"];
            $textBoxQ3Col4Value = $_POST["$textBoxQ3Col4"];
            $textBoxQ3Col5Value = $_POST["$textBoxQ3Col5"];
            $textBoxQ3Col6Value = $_POST["$textBoxQ3Col6"];

            saveForm1Q3($form1Id, $textBoxQ3Col1Value, $textBoxQ3Col2Value, 
                    $textBoxQ3Col3Value, $textBoxQ3Col4Value, 
                    $textBoxQ3Col5Value, $textBoxQ3Col6Value);            
        }//end for loop
        
        for($j=1; $j <= $q4NumItems; $j++){
            $textBoxQ4Col1 = "txtrowq4" . $j;
            $textBoxQ4Col2 = "txtrowq4" . ($j+1);
            $textBoxQ4Col3 = "txtrowq4" . ($j+2);
            $textBoxQ4Col4 = "txtrowq4" . ($j+3);
            $textBoxQ4Col5 = "txtrowq4" . ($j+4);
            $textBoxQ4Col6 = "txtrowq4" . ($j+5);            
            //now get the values...
            $textBoxQ4Col1Value = $_POST["$textBoxQ4Col1"];
            $textBoxQ4Col2Value = $_POST["$textBoxQ4Col2"];
            $textBoxQ4Col3Value = $_POST["$textBoxQ4Col3"];
            $textBoxQ4Col4Value = $_POST["$textBoxQ4Col4"];
            $textBoxQ4Col5Value = $_POST["$textBoxQ4Col5"];
            $textBoxQ4Col6Value = $_POST["$textBoxQ4Col6"];

            saveForm1Q4($form1Id, $textBoxQ4Col1Value, $textBoxQ4Col2Value, 
                    $textBoxQ4Col3Value, $textBoxQ4Col4Value, 
                    $textBoxQ4Col5Value, $textBoxQ4Col6Value);            
        }//end for loop
        
    }///end if condition...
?>
