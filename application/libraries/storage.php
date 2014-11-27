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

    public function function_more($stringx) {
        $str = "";
        $string = explode(" ", $stringx);
        if(count($string) < 50) {
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

}
