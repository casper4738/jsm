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
class berita_model extends CI_Model {

    function get_all_berita() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori', 'LEFT');
        $this->db->order_by("berita.tanggal_post", "desc");
        return $this->db->get();
    }

    function get_last_berita() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori', 'LEFT');
        $this->db->order_by("berita.tanggal_post", "desc");
        $this->db->limit(9);
        return $this->db->get();
    }

    function get_detail_berita($id) {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori');
        $this->db->order_by("berita.tanggal_post", "desc");
        $this->db->where("berita.id_berita", $id);
        return $this->db->get();
    }

    function get_list_kategori() {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by("kategori.id_kategori", "asc");
        return $this->db->get();
    }
    
    function get_detail_kategori($id) {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where("id_kategori", $id);
        return $this->db->get();
    }


    function get_berita($val1) {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori', 'LEFT');
        $this->db->order_by("berita.tanggal_post", "desc");
        $this->db->limit(5, $val1);
        return $this->db->get();
    }

    function get_count_berita() {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori');
        return $this->db->count_all_results();
    }

    function get_id() {
        return $this->db->query("SELECT MAX(id_berita)+1 AS id FROM berita WHERE id_berita LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }

    function insert($data) {
        $this->db->insert('berita', $data);
    }

    function update($data, $id) {
        $this->db->where('id_berita', $id);
        $this->db->update('berita', $data);
    }

    function delete($id) {
        $this->db->delete('berita', array('id_berita' => $id));
    }

    function insert_kategori($data) {
        $this->db->insert('kategori', $data);
    }

    function update_kategori($data, $id) {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    function delete_kategori($id) {
        $this->db->delete('kategori', array('id_kategori' => $id));
    }
    
}
