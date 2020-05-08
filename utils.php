<?php
    function runQuery($query) {
        $mysqli = new mysqli("37.59.55.185", "siEohyonbh", "wgENd15Gec", "siEohyonbh", 3306);
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