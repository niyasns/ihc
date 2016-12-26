<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-auth-token, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }

    public function events(){

        $this->load->model('event_model');


        $events = $this->event_model->get_all();

        echo json_encode($events);

       /* $result = ['2016-12-28' => [], '2016-12-29' => [],'2016-12-30' => []];

        foreach ($events as $event ){

            if($event['date'] == '2016-12-28')
            {
                array_push($result['2016-12-28'],$event);
            }
            if($event['date'] == '2016-12-29')
            {
                array_push($result['2016-12-29'],$event);
            }
            if($event['date'] == '2016-12-29')
            {
                array_push($result['2016-12-30'],$event);
            }
        }*/
       // echo json_encode($result);


    }

    public function delegates(){


        $this->load->model('delegate_model');
        $name = $this->input->get('name');
        $delegates = $this->delegate_model->get_by_name($name);
        echo json_encode($delegates);
    }

    public function papers(){

        $this->load->model('papers_model');
        $name = $this->input->get('name');
        $papers = $this->papers_model->get_by_name($name);
        echo json_encode($papers);

    }


}

?>