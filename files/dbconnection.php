<?php
    function connect(){
        @$connection = mysql_pconnect("localhost", "root", "root");
        return $connection;
    }


    function save($query){
        $dbConnection = connect();
        @mysql_select_db("db_sami_proj", $dbConnection);
        @$result = mysql_query($query);
        //echo $query;
        @$rc = mysql_affected_rows();
        return $rc;
    }

    function read($query){
        $dbConnection = connect();
        @mysql_select_db("db_sami_proj", $dbConnection);
        $result = mysql_query($query);
        return $result;
    }
?>
