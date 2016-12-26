<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Papers_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch papers record by id
    function get_papers_record($paperid)
    {
        $this->db->where('id', $paperid);
        $this->db->from('papers');
        $query = $this->db->get();
        return $query->result();
    }



    public function get_by_name($name)
    {
        $this->db->select('papers.*,events.name as event_name,events.id as event_id');
        $this->db->from('papers');
        $this->db->join('events','papers.event_id = events.id');
        $this->db->like('papers.paper_name',$name);
        return $this->db->get()->result_array();
    }


    //get event table to populate the department name dropdown
    function get_events()
    {
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('events');
        $query = $this->db->get();
        $result = $query->result();

        //array to store event id & event name
        $event_id = array('-SELECT-');
        $event_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($event_id, $result[$i]->id);
            array_push($event_name, $result[$i]->name);
        }
        return $department_result = array_combine($event_id, $event_name);
    }

    //fetch all paper records
    function get_papers_list()
    {
        $this->db->select('papers.*,events.id as event_no,events.name as event_name');
        $this->db->from('papers');
        $this->db->join('events', 'papers.event_id = events.id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
