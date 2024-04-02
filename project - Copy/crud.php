<?php
class crud
{

    private $db_hostname = "localhost:3308";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "trek_info";
    private $mysqli = "";
    private $conn = false;
    private $result = array();


    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                return false;
            }
        } else {
            return true;
        }
    }

    public function Insert($table, $params = array())
    {
        if ($this->tableExist($table)) {
            $table_col = implode(',', array_keys($params));
            $table_val = implode("','", $params);
            $sql = "insert into $table($table_col) values('$table_val')";
            if ($this->mysqli->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Update($table, $params = array(), $where = null)
    {
        if ($this->tableExist($table)) {
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key='$value'";
            }
            $sql = "update $table set " . implode(', ', $args);
            if ($where != null) {
                $sql .= " where $where";
            }
            if ($this->mysqli->query($sql)) {
                if ($this->mysqli->affected_rows) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Delete($table, $where = null)
    {
        if ($this->tableExist($table)) {
            $sql = "delete from $table";
            if ($where != null) {
                $sql .= " where $where";
            }
            if ($this->mysqli->query($sql)) {
                if ($this->mysqli->affected_rows) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        if ($this->tableExist($table)) {
            $sql = "select $rows from $table ";
            if ($join != null) {
                $sql .= " join $join ";
            }
            if ($where != null) {
                $sql .= " where $where ";
            }
            if ($order != null) {
                $sql .= " order by $order ";
            }
            if ($limit != null) {
                $sql .= " limit 0,$limit ";
            }
            // echo "$sql";
            $query = $this->mysqli->query($sql);
            if ($query) {

                // $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return $query;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

   
    //for using loop
    public function sql($sql)
    {
        $query = $this->mysqli->query($sql);
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }

    private function tableExist($table)
    {
        $sql = "show tables from $this->db_name like '$table'";

        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }
}
?>