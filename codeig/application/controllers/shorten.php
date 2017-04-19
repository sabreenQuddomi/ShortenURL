<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shorten extends CI_Controller { 
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