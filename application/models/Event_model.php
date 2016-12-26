<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all()
    {

        $this->db->select('events.*,venues.name as venue_name,venues.lat as latitude,venues.long as longitude');
        $this->db->from('events');
        $this->db->join('venues', 'events.venue_id = venues.id');
        return $this->db->get()->result_array();

    }
    public function save_event($data){

        $this->db->insert('events',$data);

    }

    //fetch events record by event id

    function get_event_record($eventid)
    {

        $this->db->where('id', $eventid);
        $this->db->from('events');
        $query = $this->db->get();
        return $query->result();
    }

    //get venues table to populate the venue name dropdown
    function get_venue()
    {
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('venues');
        $query = $this->db->get();
        $result = $query->result();

        //array to store venue id & venue name

        $venue_id = array('-SELECT-');
        $venue_name = array('-SELECT-');


        for ($i = 0; $i < count($result); $i++)
        {
            array_push($venue_id, $result[$i]->id);
            array_push($venue_name, $result[$i]->name);
        }
        return $venue_result = array_combine($venue_id, $venue_name);
    }

    function get_event_list(){

        $this->db->select('events.*,venues.name as venue_name,venues.id as venue_id,venues.lat as latitude,venues.long as longitude');
        $this->db->from('events');
        $this->db->join('venues', 'events.venue_id = venues.id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>