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
    
    
    function get_list($string) {
        $this->db->select('*');
        $this->db->from('sel');
        $this->db->where("nama_sel", $string);
        $this->db->order_by("tanggal", "desc");
        return $this->db->get();
    }
    
    function get_detail($id) {
        $this->db->select('*');
        $this->db->from('sel');
        $this->db->where("id_sel", $id);
        return $this->db->get();
    }

    function get_list1($tahun1, $bulan1, $tahun2, $bulan2, $tugas) {
        return $this->db->query("SELECT DISTINCT tanggal FROM sel WHERE MONTH(tanggal) BETWEEN '$bulan1' AND '$bulan2' AND YEAR(tanggal) BETWEEN '$tahun1' AND '$tahun2' AND tugas='$tugas' ORDER BY tanggal ASC");
    }

    function get_list2($tanggal, $tugas) {
        return $this->db->query("SELECT * FROM sel WHERE tanggal = '$tanggal' AND tugas='$tugas'");
    }

    function get_list3($tahun, $bulan, $tugas) {
        return $this->db->query("SELECT DISTINCT tanggal FROM sel WHERE tanggal LIKE '$tahun-$bulan-%' AND tugas='$tugas ';");
    }
    function get_list4($tahun, $bulan, $tugas) {
        return $this->db->query("SELECT * FROM sel WHERE tanggal LIKE '$tahun-$bulan-%' AND tugas='$tugas ';");
    }

    function get_id() {
        return $this->db->query("SELECT MAX(id_sel)+1 AS id FROM sel WHERE id_sel LIKE '" . date("Ym") . "%' LIMIT 1 ");
    }

    function insert($data) {
        $this->db->insert('sel', $data);
    }

    function delete_by_tanggal($tahun, $bulan, $tugas) {
        $this->db->query("DELETE FROM sel WHERE tanggal LIKE '$tahun-$bulan-%' AND tugas='$tugas'");
    }
    
    
    function update($data, $id) {
        $this->db->where('id_sel', $id);
        $this->db->update('sel', $data);
    }

    function delete($id) {
        $this->db->delete('sel', array('id_sel' => $id));
    }


}
