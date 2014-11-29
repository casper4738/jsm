<?php

/*
 * Netbeans 8.0 
 * JDK 1.7  
 */

/**
 * Description of Storage
 *
 * @author casper
 */
class storage {

    public function get_bulan($int) {
        switch ($int) {
            case 1: return "Januari";
            case 2: return "Februari";
            case 3: return "Maret";
            case 4: return "April";
            case 5: return "Mei";
            case 6: return "Juni";
            case 7: return "Juli";
            case 8: return "Agustus";
            case 9: return "September";
            case 10: return "Oktober";
            case 11: return "November";
            case 12: return "Desember";
            default: break;
        }
    }

    public function function_more($stringx) {
        $str = "";
        $string = explode(" ", $stringx);
        if (count($string) < 50) {
            $str = $stringx;
        } else {
            for ($index = 0; $index < 50; $index++) {
                $str = $str . " " . $string[$index];
            }
        }
        return $str;
    }

    public function init_pagination($base_url, $per_page, $total_rows) {
        $config['base_url'] = base_url() . $base_url;
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        return $config;
    }

    public function get_jumlah_hari($bulan, $tahun) {
        if ($bulan == 2) {
            if ($tahun % 4 == 0) {
                $hari = 29;
            } else {
                $hari = 28;
            }
        } else if ($bulan <= 7 && $bulan % 2 == 0) {
            $hari = 30;
        } else if ($bulan <= 7 && $bulan % 2 == 1) {
            $hari = 31;
        } else if ($bulan > 7 && $bulan % 2 == 0) {
            $hari = 31;
        } else if ($bulan > 7 && $bulan % 2 == 1) {
            $hari = 30;
        }
        return $hari;
    }

}
