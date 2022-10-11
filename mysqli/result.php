<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('192.168.220.25', 'root', 'root', 'php');
$mysqli->real_query("SELECT * FROM php_log LIMIT 10");

$queryResult = new mysqli_result($mysqli);

printf("Select fields count : %d \n", $queryResult->field_count);
printf("Select count : %d \n", $queryResult->num_rows);

$length = $queryResult->lengths;

//$fetchAll = $queryResult->fetch_all();
//$fetchArr = $queryResult->fetch_array();
//$fetchAss = $queryResult->fetch_assoc();
//$fetchCol = $queryResult->fetch_column();
//$fetchFD = $queryResult->fetch_field_direct(1);
//$fetchField = $queryResult->fetch_field();
//$fetchFields = $queryResult->fetch_fields();
//$fetchOBJ = $queryResult->fetch_object();
//$fetchRow = $queryResult->fetch_row();
$fetchIterator = $queryResult->getIterator();

while ($col = $queryResult->fetch_field()) {
    $currentField = $queryResult->current_field;
    printf("Column %d:\n", $currentField);
    printf("Name:     %s\n", $col->name);
    printf("Table:    %s\n", $col->table);
    printf("max. Len: %d\n", $col->max_length);
    printf("Flags:    %d\n", $col->flags);
    printf("Type:     %d\n\n", $col->type);
}
$queryResult->data_seek(1);
$queryResult->free();
