<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Papers extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the papers model
        $this->load->model('papers_model');
    }
    public function index()
    {
        $this->home();
    }

    public function home()
    {
        //get the papers list
        $data['paper_list'] = $this->papers_model->get_papers_list();
        $this->load->view('papers/delete', $data);
    }


    //delete paper record from db
    function delete($id)
    {
        //delete paper record
        $this->db->where('id', $id);
        $this->db->delete('papers');
        redirect('papers/index');
    }

    public function create()
    {
        //fetch data from events tables
        $data['event'] = $this->papers_model->get_events();

        //set validation rules
        $this->form_validation->set_rules('papername', 'Paper Name', 'trim|required');
        $this->form_validation->set_rules('delegatename', 'Delegate Name', 'trim|required|callback_alpha_only_space');
        $this->form_validation->set_rules('event', 'Event', 'callback_combo_check');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('papers/create', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'paper_name' => $this->input->post('papername'),
                'delegate_name' => $this->input->post('delegatename'),
                'event_id' => $this->input->post('event'),
            );

            //insert the form data into database
            $this->db->insert('papers', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Paper details added to Database!!!</div>');
            redirect('papers/create');
        }

    }

    public function update($paperid)
    {
        $data['paperid'] = $paperid;

        //fetch data from event tables
        $data['event'] = $this->papers_model->get_events();

        //fetch papers record for the given paper id
        $data['paperrecord'] = $this->papers_model->get_papers_record($paperid);

        //set validation rules
        $this->form_validation->set_rules('papername', 'Paper Name', 'trim|required');
        $this->form_validation->set_rules('delegatename', 'Delegate Name', 'trim|required|callback_alpha_only_space');
        $this->form_validation->set_rules('event', 'Event', 'required|callback_combo_check');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('papers/update', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'paper_name' => $this->input->post('papername'),
                'delegate_name' => $this->input->post('delegatename'),
                'event_id' => $this->input->post('event'),
            );

            //update employee record
            $this->db->where('id', $paperid);
            $this->db->update('papers', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee Record is Successfully Updated!</div>');
            redirect('papers/update/' . $paperid);
        }
    }

    public function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid %s Name is required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //custom validation function to accept only alpha and space input
    public function alpha_only_space($str)
    {
        if (!preg_match("/^([-a-z ])+$/i", $str))
        {
            $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

?>