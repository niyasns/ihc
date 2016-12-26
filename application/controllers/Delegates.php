<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegates extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->database();
        ;
        //load the employee model
        $this->load->model('delegate_model');
    }

    public function index()
    {
        $this->home();
    }
    public function home()
    {
        //get the delegates list
        $data['delegates_list'] = $this->delegate_model->get_delegate_list();
        $this->load->view('delegates/delete',$data);
    }

    function delete($id)
    {
        //lists and delete delegates record
        $this->db->where('id', $id);
        $this->db->delete('delegates');
        redirect('delegates/index');
    }

    public function create()
    {

        $lastid = $this->delegate_model->get_lastid();
        $data['idlast'] = $lastid;

        //fetch data from accomodation  tables
        $data['accomodation'] = $this->delegate_model->get_accomodation();

        //set validation rules
        $this->form_validation->set_rules('delegatename', 'delegatename', 'trim|required|callback_alpha_only_space');
        $this->form_validation->set_rules('gender', 'Gender', 'required|callback_username_check');
        $this->form_validation->set_rules('mobile', 'Mobile', 'numeric');
        $this->form_validation->set_rules('roomno', 'Room No');
        $this->form_validation->set_rules('accomodationid', 'Accomodation Id', 'callback_combo_check');
        $this->form_validation->set_rules('memid', 'Member Id', 'required');


        if ($this->form_validation->run() == FALSE) {
            //fail validation
            $this->load->view('delegates/create', $data);
        } else {
            //pass validation
            $data = array(
                'id' => $this->input->post('delegateid'),
                'name' => $this->input->post('delegatename'),
                'gender' => $this->input->post('gender'),
                'mobile' => $this->input->post('mobile'),
                'accomodation_id' => $this->input->post('accomodationid'),
                'mem_id' => $this->input->post('memid'),

            );

            //insert the form data into database
            $this->db->insert('delegates', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Delegate details added to Database!!!</div>');
            redirect('delegates/create');
        }
    }


        public function update($delid){

            $data['delid'] = $delid;


            //fetch data from accomodation  tables
            $data['accomodation'] = $this->delegate_model->get_accomodation();

            $data['delrecord'] = $this->delegate_model->get_delegate_record($delid);

            //set validation rules
            $this->form_validation->set_rules('delegatename', 'delegatename', 'trim|required|callback_alpha_only_space');
            $this->form_validation->set_rules('gender', 'Gender', 'required|callback_username_check');
            $this->form_validation->set_rules('mobile', 'Mobile', 'numeric');
            $this->form_validation->set_rules('roomno', 'Room No');
            $this->form_validation->set_rules('accomodationid', 'Accomodation Id', 'callback_combo_check');
            $this->form_validation->set_rules('memid', 'Member Id', 'required');

            if ($this->form_validation->run() == FALSE) {
                //fail validation
                $this->load->view('delegates/update', $data);
            } else {
                //pass validation
                $data = array(
                    'id' => $this->input->post('delegateid'),
                    'name' => $this->input->post('delegatename'),
                    'gender' => $this->input->post('gender'),
                    'mobile' => $this->input->post('mobile'),
                    'accomodation_id' => $this->input->post('accomodationid'),
                    'mem_id' => $this->input->post('memid'),

                );

                //insert the form data into database
                $this->db->insert('delegates', $data);

                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Delegate details updated to Database!!!</div>');
                redirect('delegates/update');
            }

        }


    //custom form validation fucntions

    public function username_check($str)
    {
        if ($str == 'male'|$str == 'female'|$str == 'trans') {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('username_check', 'This field only accept male,female,trans');
            return FALSE;
        }
    }
    public function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid  Name is required');
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
            $this->form_validation->set_message('alpha_only_space', 'The field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}

?>