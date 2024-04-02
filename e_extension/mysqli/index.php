<?php
$mysqli = mysqli_connect('192.168.220.25', 'root', 'root', 'php');
$mysqli->options(MYSQLI_OPT_READ_TIMEOUT, 10);
$mysqli->select_db('php');
$mysqli->set_charset('utf8mb4');

$createTableSql = <<<EOF
CREATE TABLE php_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
log_index VARCHAR(30) NOT NULL,
content VARCHAR(256) NOT NULL,
created_at TIMESTAMP
)
EOF;

try {
    if ($mysqli->query($createTableSql) === true) {
        echo "Table php_log created successfully";
    } else {
        echo "Table php_log created failed: " . $mysqli->error;
    }
    var_dump($mysqli->error_list);
} catch (\Throwable $exception) {
    echo sprintf("err is %s\n", $mysqli->connect_error);
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$queryResult = $mysqli->query("SELECT * FROM php_log");
printf("Affected rows(SELECT): %d\n", $mysqli->affected_rows);
printf("Field count : %d\n", $mysqli->field_count);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$mysqli->autocommit(true);
$queryResult = $mysqli->query("SELECT @@autocommit");
$rowData = $queryResult->fetch_row();
printf("Autocommit is %s\n", $rowData[0]);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$mysqli->query("INSERT INTO php_log(log_index, content) VALUES ('Test1', 'Log the transaction01')");
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$mysqli->begin_transaction();
try {
    $mysqli->query("INSERT INTO php_log(log_index, content) VALUES ('Test', 'Log the transaction02')");
    throw new RuntimeException('');
} catch (\Throwable $exception) {
    $mysqli->rollback();
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo sprintf("Current character set is %s\n", $mysqli->character_set_name());
echo sprintf("Current host info is %s\n", $mysqli->host_info);
echo sprintf("Current proto version is %s\n", $mysqli->protocol_version);

echo sprintf("Current server info is %s\n", $mysqli->server_info);
echo sprintf("Current server version is %s\n", $mysqli->server_version);
echo sprintf("Current system info is %s\n", $mysqli->stat);


echo sprintf("Last exec sql is %s\n", $mysqli->info);
echo sprintf("Last insert id is %s\n", $mysqli->insert_id);
echo sprintf("thread is safe is %s\n", $mysqli->thread_safe() ? 'yes' : 'no');
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$query = "SELECT CURRENT_USER();";
$query .= "SELECT * FROM php_log";
if ($mysqli->multi_query($query)) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        if ($mysqli->more_results()) {
            printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$name = 'Test1';
$mysqli->stmt_init();
$stmt = $mysqli->prepare("SELECT * FROM php_log WHERE log_index=?");
$stmt->bind_param("s", $name);
$stmt->execute();
$stmt->bind_result($result1, $result2, $result3, $result4);
$stmt->fetch();
$stmt->close();
$mysqli->refresh(MYSQLI_REFRESH_GRANT);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

printf("SQLSTATE %s.\n", $mysqli->sqlstate);
if (!$mysqli->ping()) {
    return;
}
//var_dump($mysqli->get_charset());
//var_dump($mysqli->get_connection_stats());

$processId = $mysqli->thread_id;
$mysqli->kill($processId);
$mysqli->close();