<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
this code do the loads the main view and handles requests for long URLs 
to be turned into short URLS by index method
and also load the model for dealing 
with short URLs and get the segment the user requested 
and direct the user to the long URL the short URL this by get shorty function
also the a little error for when users enter an invalid short URL done by error fun.(If the short URL can not be found the user is redirected to 
404_error which the routes file routes to this method).
*/
class control-shorten extends CI_Controller { 
    public function index() 
    {
        $data=array(); 
        if($this->input->post('url'))
        {
            $this->load->model('short_url_model');
            $short_url=$this->short_url_model->store_long_url();
            if($short_url)
            {
                $data['short_url']=$short_url;
            }
            else 
            {
                $data['error']=validation_errors();
            }
        }

        $this->load->view('get_url', $data);
    }

    public function get_shorty() 
    {
        $this->load->model('short_url_model'); 
        $shorty=$this->uri->segment(1);
         redirect($this->short_url_model->get_long_url($shorty));
    }

    public function error_404()
    {
        $data['error']='Whoops cannot find that URL!';
        $this->load->view('get_url', $data);
    }

}