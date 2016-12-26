<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accomodation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the accomodation model
        $this->load->model('accomodation_model');
    }

    public function index()
    {
        $this->home();
    }
    public function home(){

        //get the accomodation list
        $data['acc_list'] = $this->accomodation_model->get_accomodation_list();
        $this->load->view('accomodation/delete', $data);

    }
    //delete accomodation record from db
    function delete($id)
    {
        //delete accomodation record
        $this->db->where('id', $id);
        $this->db->delete('accomodation');
        redirect('accomodation/index');
    }

    public function create(){


        //set validation rules
        $this->form_validation->set_rules('accomname', 'Accomodation Name', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('accomodation/create');
        }
        else
        {
            //pass validation
            $data = array(
                'name' => $this->input->post('accomname'),
                'lat' => $this->input->post('latitude'),
                'long' => $this->input->post('longitude'),
            );

            //insert the form data into database
            $this->db->insert('accomodation', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Accomodation details added to Database!!!</div>');
            redirect('accomodation/create');
        }
    }

    public function update($accid){

        $data['accid'] = $accid;

        $data['accrecord'] = $this->accomodation_model->get_accomodation_record($accid);

        //set validation rules
        $this->form_validation->set_rules('accname', 'Accomodation Name', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('accomodation/update', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'name' => $this->input->post('accname'),
                'lat' => $this->input->post('latitude'),
                'long' => $this->input->post('longitude'),
            );

            //update employee record
            $this->db->where('id', $accid);
            $this->db->update('accomodation', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Accomodation Record is Successfully Updated!</div>');
            redirect('accomodation/update/' . $accid);
        }
    }

}

?>