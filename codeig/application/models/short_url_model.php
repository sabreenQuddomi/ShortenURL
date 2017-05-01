<?php
    /*
    the model do by two fun .:1.validates the input from the user, inserts the long URL into the database,
     masks the ID of the record and returns it to the controller by store_long_url func.
//////////////////////////////2.decodes the ID and searches the database for the ID and
 if it cannot be found return the 404 link by Retrive the long URL
    */

class Short_url_model extends CI_Model {

    function store_long_url()
    {
    	$this->form_validation->set_rules('url', 'URL', 'trim|prep_url|required|min_length[5]|max_length[250]|xss_clean');
    	if($this->form_validation->run())
    	{
    		$this->db->insert('urls', array('long_url'=>$this->input->post('url')));
    		return str_replace('=','-', base64_encode($this->db->insert_id()));
    	}
    }

    function get_long_url($shorty='')
    {
    	$query=$this->db->get_where('urls', array('id'=> base64_decode(str_replace('-','=', $shorty))));
    	if($query->num_rows()>0)
    	{
    		foreach ($query->result() as $row)
			{
			    return $row->long_url;
			}
    	}
    	return '/error_404';
    }

}

