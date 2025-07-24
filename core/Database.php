<?php
class Database {
    private $conn;

    public function __construct() {
        $username = "Gabriel";
        $password = "testando123";
        $connStr = "(DESCRIPTION =
                        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                        (CONNECT_DATA = (SERVICE_NAME = XE)))";
        $this->conn = oci_connect($username, $password, $connStr);

        if (!$this->conn) {
            $e = oci_error();
            die("Erro na conexão Oracle: " . $e['message']);
        }
    }

    public function query($sql, $params = []) {
        $stmt = oci_parse($this->conn, $sql);
        foreach ($params as $key => $val) {
            oci_bind_by_name($stmt, $key, $params[$key]);
        }
        oci_execute($stmt);
        $result = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $result[] = $row;
        }
        return $result;
    }

    public function __destruct() {
        oci_close($this->conn);
    }
}
