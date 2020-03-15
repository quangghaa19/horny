<?php 
require PATH_SYSTEM . '/core/Model.php';
class Crud_Model extends Model
{
    // Table name
    protected $_table_name = '';
     
    // ID key 
    protected $_key = '';
     
    // Initiate function
    function __construct() {
        parent::connect();
    }
     
    // Disconnect function
    function __destruct() {
        parent::dis_connect();
    }

    // Set table name
    function set_table_name($_table_name){
        $this->_table_name = $_table_name;
    }

    // Set table name and id key
    function set_all($_table_name, $_key){
        $this->_table_name = $_table_name;
        $this->_key = $_key;
    }

    // Add new function
    function add_new($data){
        return parent::insert($this->_table_name, $data);
    }
 
    // Delete by id
    function delete_by_id($id){
        return $this->remove($this->_table_name, $this->_key.'='.(int)$id);
    }
 
    // Update by id
    function update_by_id($data, $id){
        return $this->update($this->_table_name, $data, $this->_key."=".(int)$id);
    }
 
    // Select by id
    function select_by_id($select, $id){
        $sql = "select $select from ".$this->_table_name." where ".$this->_key." = ".(int)$id;
        return $this->get_row($sql);
    }
} 
?>
