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
class slider_model extends CI_Model {


    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where("id_slider", $id);
        return $this->db->get();
    }

    function update($data) {
        $this->db->query("REPLACE INTO slider SET id_slider='$data[id_file]', file_ext='$data[file_ext]' ");
    }

    
}
