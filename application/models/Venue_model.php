<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venue_model extends CI_Model {

    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }

    //fetch employee record by employee no
    function get_venues_record($venueid)
    {
        $this->db->where('id', $venueid);
        $this->db->from('venues');
        $query = $this->db->get();
        return $query->result();
    }

    function get_venues_list()
    {
        $this->db->from('venues');
        $query = $this->db->get();
        return $query->result();
    }


}

?>