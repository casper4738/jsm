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
class galeri_model extends CI_Model {
    
    function get_galeri($val1) {
       $this->db->select('*');
        $this->db->from('galeri');
        $this->db->order_by("tanggal_post", "desc");
        $this->db->limit(12, $val1);
        return $this->db->get();
    }
    
    
    function get_count() {
        $this->db->select('count(id_galeri) as id');
        $this->db->from('galeri');
        return $this->db->get();
    }
    
    function get_list() {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->order_by("tanggal_post", "desc");
        return $this->db->get();
    }
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where("id_galeri", $id);
        return $this->db->get();
    }

    function get_id() {
        return $this->db->query("SELECT MAX(id_galeri)+1 AS id FROM galeri WHERE id_galeri LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }
    
     function insert($data) {
        $this->db->insert('galeri', $data);
    }

    function update($data, $id) {
        $this->db->where('id_galeri', $id);
        $this->db->update('galeri', $data);
    }

    function delete($id) {
        $this->db->delete('galeri', array('id_galeri' => $id));
    }
    
}
