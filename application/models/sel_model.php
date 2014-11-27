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
class sel_model extends CI_Model {
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('sel');
        $this->db->where("id_sel", $id);
        return $this->db->get();
    }
    
    function get_list($string) {
        $this->db->select('*');
        $this->db->from('sel');
        $this->db->where("nama_sel", $string);
        $this->db->order_by("tanggal", "desc");
        return $this->db->get();
    }
    
    function get_id() {
        return $this->db->query("SELECT MAX(id_sel)+1 AS id FROM sel WHERE id_sel LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }

    function insert($data) {
        $this->db->insert('sel', $data);
    }

    function update($data, $id) {
        $this->db->where('id_sel', $id);
        $this->db->update('sel', $data);
    }

    function delete($id) {
        $this->db->delete('sel', array('id_sel' => $id));
    }

    
}
