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
class korbid_model extends CI_Model {


    function get_list($string) {
        $this->db->select('*');
        $this->db->from('kordinator_bidang');
        $this->db->where("jenis_korbid", $string);
        $this->db->order_by("tanggal", "desc");
        return $this->db->get();
    }
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('kordinator_bidang');
        $this->db->where("id_korbid", $id);
        return $this->db->get();
    }

    function get_id() {
        return $this->db->query("SELECT MAX(id_korbid)+1 AS id FROM kordinator_bidang WHERE id_korbid LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }

    function insert($data) {
        $this->db->insert('kordinator_bidang', $data);
    }

    function update($data, $id) {
        $this->db->where('id_korbid', $id);
        $this->db->update('kordinator_bidang', $data);
    }

    function delete($id) {
        $this->db->delete('kordinator_bidang', array('id_korbid' => $id));
    }

    
}
