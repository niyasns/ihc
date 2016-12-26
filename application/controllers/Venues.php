<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venues extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the venue model
        $this->load->model('venue_model');
    }

    public function index()
    {

        $this->home();
    }
    public function home()
    {

        //get the venue list
        $data['venue_list'] = $this->venue_model->get_venues_list();
        $this->load->view('venues/delete', $data);

    }

    public function delete($id){

        $this->db->where('id', $id);
        $this->db->delete('venues');
        redirect('venues/index');
    }
    public function create(){


        $this->form_validation->set_rules('venuename', 'Venue Name', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude'.'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('venues/create');
        }
        else
        {
            //pass validation
            $data = array(
                'name' => $this->input->post('venuename'),
                'lat' => $this->input->post('latitude'),
                'long' => $this->input->post('longitude'),
            );

            //insert the form data into database
            $this->db->insert('venues', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Venue details added to Database!!!</div>');
            redirect('venues/create');
        }

    }

    public function update($venueid){

        $data['venueid'] = $venueid;

        $data['venrecord'] = $this->venue_model->get_venues_record($venueid);

        //set validation rules
        $this->form_validation->set_rules('venuename', 'Venue Name', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('venues/update', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'name' => $this->input->post('venuename'),
                'lat' => $this->input->post('latitude'),
                'long' => $this->input->post('longitude'),
            );

            //update venue record
            $this->db->where('id', $venueid);
            $this->db->update('venues', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Venue Record is Successfully Updated!</div>');
            redirect('venues/update/' . $venueid);
        }
    }
}
?>