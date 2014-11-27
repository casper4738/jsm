<?php

/*
 * Netbeans 8.0 
 * JDK 1.7  
 */

/**
 * Description of galeri_model
 *
 * @author casper
 */
class content_model extends CI_Model {
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where("id_content", $id);
        return $this->db->get();
    }

    function insert($data) {
        $this->db->insert('content', $data);
    }

    function update($data, $id) {
        $this->db->where('id_content', $id);
        $this->db->update('content', $data);
    }

    function delete($id) {
        $this->db->delete('content', array('id_content' => $id));
    }

    
}
