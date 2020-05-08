<?php
    function runQuery($query) {
        $mysqli = new mysqli("localhost","root","password","memehub");
        $result = $mysqli->query($query);
                    
        if ($result === FALSE || $result === TRUE) {
            return $result;
        } else {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
?>
