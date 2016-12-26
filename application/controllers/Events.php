<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the event model
        $this->load->model('event_model');

    }

    public function index()
    {
        $this->home();

    }

    public function home()
    {
        //get the event list
        $data['events_list'] = $this->event_model->get_event_list();
        $this->load->view('events/delete',$data);
    }

    function delete($id)
    {
        //lists and delete events record
        $this->db->where('id', $id);
        $this->db->delete('events');
        redirect('events/index');
    }


    public function create()
    {

        //fetch data from accomodation  tables
        $data['venue'] = $this->event_model->get_venue();

//Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[15]');

//Validating Email Field
        $this->form_validation->set_rules('timestart', 'Start time','required');

//Validating Mobile no. Field
        $this->form_validation->set_rules('timeend', 'End time','required');

//Validating Address Field
        $this->form_validation->set_rules('venueid', 'Venue id','trim|required|callback_combo_check');

        $this->form_validation->set_rules('date', 'Date','trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('events/create', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'name' => $this->input->post('name'),
                'time_start' => $this->input->post('timestart'),
                'time_end' => $this->input->post('timeend'),
                'venue_id' => $this->input->post('venueid'),
                'date' => @date('Y-m-d', @strtotime($this->input->post('date'))),
            );

            //insert the form data into database
            $this->db->insert('events', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Event details added to Database!!!</div>');
            redirect('events/create');
        }

    }

    function update($eventid)
    {

        $data['eventid'] = $eventid;

        //fetch data from  venue tables
        $data['venue'] = $this->event_model->get_venue();

        //fetch event record for the given event id
        $data['eventrecord'] = $this->event_model->get_event_record($eventid);

        //set validation rules
        $this->form_validation->set_rules('eventname', 'Event Name', 'trim|required|callback_alpha_only_space');
        $this->form_validation->set_rules('starttime', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('endtime', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('venueid', 'Venue id', 'numeric|trim|required|callback_combo_check');
        $this->form_validation->set_rules('date', 'Date', 'required');


        if ($this->form_validation->run() == FALSE) {
            //fail validation
            $this->load->view('events/update', $data);
        } else {

            //pass validation
            $data = array(
                'name' => $this->input->post('eventname'),
                'time_start' => $this->input->post('starttime'),
                'time_end' => $this->input->post('endtime'),
                'venue_id' => $this->input->post('venueid'),
                'date' => @date('Y-m-d', @strtotime($this->input->post('date'))),
            );

            //update events record
            $this->db->where('id', $eventid);
            $this->db->update('events', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee Record is Successfully Updated!</div>');
            redirect('events/update/' . $eventid);

        }
    }

        //custom validation function for dropdown input
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
            if (!preg_match("/^([-a-z ])+$/i", $str)) {
                $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
                return FALSE;
            } else {
                return TRUE;
            }
        }
}
?>

