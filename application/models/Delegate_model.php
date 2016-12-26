<?php
class Delegate_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all()
    {
        return $this->db->get('delegates')->result_array();

    }
    public function get_by_name($name)
    {
        $this->db->select('delegates.*,accomodation.name as accomodation_name,accomodation.lat as latitide,accomodation.long as longitude');
        $this->db->from('delegates');
        $this->db->join('accomodation','accomodation.id = delegates.accomodation_id');
        $this->db->like('delegates.name',$name);
        return $this->db->get()->result_array();
    }

    function get_delegate_record($delid)
    {
        $this->db->where('id', $delid);
        $this->db->from('delegates');
        $query = $this->db->get();
        return $query->result();
    }


    //get accomodation table to populate the department name dropdown
    function get_accomodation()
    {
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('accomodation');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $accom_id = array('-SELECT-');
        $accom_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($accom_id, $result[$i]->id);
            array_push($accom_name, $result[$i]->name);
        }

        return $accomodation_result = array_combine($accom_id, $accom_name);
    }
    function get_lastid(){
        $lastInsertedID = $this->db->count_all('delegates');
        return $lastInsertedID+1;
    }

    function get_delegate_list(){

        $this->db->select('delegates.*,accomodation.name as accomodation_name,accomodation.id as accomodation_id,accomodation.lat as latitude,accomodation.long as longitude');
        $this->db->from('delegates');
        $this->db->join('accomodation', 'delegates.accomodation_id = accomodation.id');
        $query = $this->db->get();
        return $query->result();
    }


}

?>