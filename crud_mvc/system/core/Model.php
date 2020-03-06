<?php
// Library proceed database

class Model
{
    // Connection variable 
    private $__conn;
    
    // Result variable
    protected $_result = NULL;
    
    // Hàm Kết Nối
    public function connect()
    {
        // If not connect   ===> connect
        if (!$this->__conn){
            $this->__conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ('Lỗi kết nối');
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
 
    // Disconnect function
    public function dis_connect()
    {
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }

    
    public function get_result()
    {
        $result_tmp = array();
        if ( ! empty($this->_result)){
            while ($row = mysql_fetch_array($result)){
                array_push($result_tmp, $row);
            }
        }
        return $result_tmp;
    }

    // Get list data
    function get_list($sql)
    {
        
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
 
        $return = array();
 
        // Loop through result
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
 
        // Release memory
        mysqli_free_result($result);
 
        return $return;
    }

    // Get one row
    function get_row($sql)
    {
        
        $this->connect();
     
        $result = mysqli_query($this->__conn, $sql);
     
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
     
        $row = mysqli_fetch_assoc($result);
     
        mysqli_free_result($result);
     
        if ($row){
            return $row;
        }
     
        return false;
    }
     
    // Insert a row
    public function insert($table, $data)
    {
        
        $this->connect();
 
        // Field list
        $field_list = '';
        // Value list
        $value_list = '';
 
        // Loop through data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysql_escape_string($value)."'";
        }
 
        // Remove unnecessary ','
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->__conn, $sql);
    }
 
    // Update function
    public function update($table, $data, $where)
    {
        
        $this->connect();
        $sql = '';
        
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysql_escape_string($value)."',";
        }
 
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
 
        return mysqli_query($this->__conn, $sql);
    }
 
    // Delete function
    public function remove($table, $where)
    {
        
        $this->connect();
         
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }
 
    // Execute function
    public function execute($sql)
    { 
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            $this->_result = NULL;
            return FALSE;
        }
        
        $this->_result = $result;
        return TRUE;
    }
}