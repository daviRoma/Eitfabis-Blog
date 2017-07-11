<?php

require_once _ROOT . '/configs/dbsetup.php' ;

//CONNESSIONE DATABASE
// $path: pathname del file di configurazione del database
function dbConnect() {
	$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Errore connessione al database: " . mysqli_connect_error());

    return $conn;
}

$conn = dbConnect();


// DATA SELECTION
// input: target table, selection condition
// output: row[0] of the table that meets the condition
function selectRecord($table, $condition) {
    return selectQuery($table, $condition, "")[0];
}


// GENERAL SELECTION
// input: target table, selection condition, rows sorting condition
// output: rows found array
function selectQuery($table, $condition, $order) {
    global $conn;

    // query generation
    $query= " SELECT * FROM `$table`";

    if($condition!="")
        $query .= " WHERE {$condition}";

    if($order!="")
        $query .= " ORDER BY {$order}";

    // running query
    $select = mysqli_query($conn, $query) or die("Error select query: " . mysqli_error($conn));

    if (!$select)
        return false;

    $result = array();

    while ($current = mysqli_fetch_assoc($select))
        $result[] = $current;

	// return records found, otherwise false
    return $result;
}


// DATA ENTRY
// input: target table, array of data to insert: {<attribute name> => <attribute value>}
// **** Note: Only numbers and strings ****
function insertRecord($table, $data) {
    global $conn;

    // query generation
    $query = "INSERT INTO `$table` SET ";

    foreach($data as $attr => $value) {
        $value = str_replace("'", "\'", $value);

        if(is_numeric($value))
        	$query .= "$attr = {$value}, ";
        else
        	$query .= "$attr = '{$value}', ";
    }

    // deleting one space and last comma
    $query = substr($query, 0, strlen($query)-2);

	// running query
    $insert = mysqli_query($conn, $query) or die("Error insert query: " . mysqli_error($conn));

    // return the id of the tuple just entered
    return mysqli_insert_id($conn);
}


// DATA UPDATE
// input: target table,
//        array of data to update: '<attribute name>' => <attribute value>
//        record selection condition: <attribute name> = '<attribute value>'
// **** Note: Only numbers and strings ****
function updateRecord($table, $data, $condition) {
    global $conn;

    // query generation
    $query = "UPDATE `$table` SET ";
    foreach($data as $attr => $value) {
        $value = str_replace("'", "\'", $value);

        if(is_numeric($value) || strpos($value, "+"))
            $query .= "$attr = {$value}, ";
        else
            $query .= "$attr = '{$value}', ";
    }

    // deleting one space and last comma
    $query = substr($query, 0, strlen($query)-2);

    // adding condition
    $query .= " WHERE {$condition}";

    // running query
    $update = mysqli_query($conn, $query) or die("Error update query: " . mysqli_error($conn));
}


// DATA DELETING
// input: target table, deleting condition
function deleteRecord($table, $condition) {
    global $conn;

    // Generazione query
    $query = "DELETE FROM `$table`";

    if ($condition!="")
      $query .= " WHERE {$condition}";

    // Esecuzione query
    $delete = mysqli_query($conn, $query) or die("Error delete query: " . mysqli_error($conn));
}


// DATA COUNT
// input: target table, selection condition
// output: number of records that meet the condition
function countRecord($table, $condition) {
    global $conn;

    // query generation
    $query = "SELECT COUNT(*) AS num_count FROM `$table`";

    if ($condition!="")
        $query .= " WHERE {$condition}";

    // running query
    $result = mysqli_query($conn, $query) or die("Error count query: " . mysqli_error($conn));

    $row = mysqli_fetch_assoc($result);

    return $row["num_count"];
}


// JOIN SELECTION
// input: target table_1, target table_2, join condition, selection condition
// output: array of records that meet the condition after a join between table_1 and table_2
// **** Note: conditions columns MUST have different names ****
function selectJoin($table_1, $table_2, $join_condition, $where_condition){
    global $conn;

    // query generation
    $query= " SELECT * FROM `$table_1` JOIN `$table_2` ON {$join_condition}";

    if($where_condition!="")
    	$query .= " WHERE {$where_condition}";

    // running query
    $select = mysqli_query($conn, $query) or die("Error select query: " . mysqli_error($conn));

    if (!$select)
    	return false;

    $result = array();

    while ($current = mysqli_fetch_assoc($select))
    	$result[] = $current;

    // return records found, otherwise false
    return $result;
}

?>
