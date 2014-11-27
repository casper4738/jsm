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
        $this->db->from('korbid');
        $this->db->where("jenis_korbid", $string);
        $this->db->order_by("tanggal", "desc");
        return $this->db->get();
    }
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('korbid');
        $this->db->where("nama_korbid", $id);
        return $this->db->get();
    }

    function update($data) {
        $this->db->query("REPLACE INTO korbid SET nama_korbid='$data[nama_korbid]', tugas='$data[tugas]' ");
    }

    function delete($id) {
        $this->db->delete('korbid', array('id_korbid' => $id));
    }

    
}
