<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Accomodation_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    function get_accomodation_record($accid)
    {
        $this->db->where('id', $accid);
        $this->db->from('accomodation');
        $query = $this->db->get();
        return $query->result();
    }

    //fetch all accomodation records
    function get_accomodation_list()
    {
        $this->db->from('accomodation');
        $query = $this->db->get();
        return $query->result();
    }
}


?>