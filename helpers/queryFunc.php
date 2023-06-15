<?php
function selectData($table, $columns = '*', $conditions = '') {
    global $conn;
    $query = "SELECT $columns FROM $table";
    
    if (!empty($conditions)) {
        $query .= " WHERE $conditions";
    }
    
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }
    
    $data = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    mysqli_close($conn);
    
    return $data;
}

?>