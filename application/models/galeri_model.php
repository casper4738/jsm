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
    
    function get_album() {
        $this->db->select('*');
        $this->db->from('album');
        return $this->db->get();
    }

    function get_galeri($val1, $val2) {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->join('foto', 'galeri.id_foto = foto.id_foto');
        $this->db->join('album', 'galeri.id_album = album.id_album');
        $this->db->where('album.id_album', $val1);
        $this->db->order_by("foto.tanggal_post", "desc"); 
        $this->db->limit(9, $val2);
        return $this->db->get();
    }

    function get_num_rows() {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->join('foto', 'galeri.id_foto = foto.id_foto');
        return $this->db->get();
    }

}
