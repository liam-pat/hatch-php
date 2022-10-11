<?php
$mysqli = mysqli_connect('192.168.220.25', 'root', 'root', 'php');

$insertSql = <<<EOF
INSERT INTO php_log(log_index, content) VALUES (?, ?)
EOF;

$querySql = <<<EOF
SELECT log_index,content FROM php_log WHERE log_index = ?
EOF;
/**
 * i - integer
 * d - double
 * s - string
 * b - BLOB
 */
$stmt = $mysqli->prepare($insertSql);
$logIndex = 'index01-' . microtime(true);
$content = sprintf('content : %s', microtime(true));

$stmt->bind_param('ss', $logIndex, $content);
$stmt->execute();
printf("affected rows : %s , insert id : %d \n", $stmt->affected_rows, $stmt->insert_id);
$stmt->reset();
$stmt->close();

$stmt01 = $mysqli->prepare($querySql);
$stmt01->bind_param('s', $logIndex);
$stmt01->execute();
printf("state: %s.\n", $stmt01->sqlstate);

$row = $stmt01->get_result()->fetch_row();
$metaResult = $stmt01->result_metadata();
$field = $metaResult->fetch_field();
printf("Field name: %s\n", $field->name);

$stmt01->bind_result($result01, $result02);
//$stmt01->fetch();

$stmt01->data_seek(0);
//$stmt01->store_result();

printf("Query param is %s \n", $stmt01->param_count);
printf("Number of rows is %s \n", $stmt01->num_rows());

for ($i = 0; $i < $stmt01->field_count; $i++) {
    printf("Value of column number %d = %s \n", $i, $row[$i]);
}
if ($stmt01->more_results()) {
    $nextResult = $stmt01->next_result();
}

$stmt01->free_result();
$stmt01->close();


$mysqli->close();
