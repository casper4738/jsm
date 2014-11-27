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
class event_model extends CI_Model {

    function get_last() {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->order_by("tanggal_event", "desc");
        $this->db->limit(9);
        return $this->db->get();
    }
    
    function get_list() {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->order_by("tanggal_event", "desc");
        return $this->db->get();
    }

    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where("id_event", $id);
        return $this->db->get();
    }

    function get_id() {
        return $this->db->query("SELECT MAX(id_event)+1 AS id FROM event WHERE id_event LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }

    function insert($data) {
        $this->db->insert('event', $data);
    }

    function update($data, $id) {
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);
    }

    function delete($id) {
        $this->db->delete('event', array('id_event' => $id));
    }

}
