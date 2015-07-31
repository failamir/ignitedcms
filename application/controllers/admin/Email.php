<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("email");

					if($pass != true)
					{
						redirect('admin/dashboard','refresh');
					}
			  	}
			  	else
			  	{
			  		redirect('admin/installer','refresh');
			  	}
		  }
	}

	/**
	  *  @Description: the view file to save email settings
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function index()
	{
		$this->db->select('*');
		$this->db->from('email');
		$this->db->where('id', 1);
		$this->db->limit(1);

		$query2 = $this->db->get();

		$protocol = "";
		
		foreach ($query2->result() as $row) 
		{
			$protocol =  $row->protocol;
		}
		


		$data['query2'] = $query2;

		$data['protocol'] = $protocol;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/email/email-view',$data);
		$this->load->view('admin/email/footer',$data);
	}

	 
	

	 /**
	  *  @Description: save smtp/phpmail email settings to db
	  *       @Params: _POST $protocol; 
	  *				  $smtp_host;
	  *				  $smtp_port;
	  *				  $smtp_user;
	  *				  $smtp_pass;
	  *
	  *  	 @returns: nothing
	  */
	public function save_email_settings()
	{
		//get the _POST data and save to database
		$protocol  = $this->input->post('protocol');
		$smtp_host  = $this->input->post('smtp_host');
		$smtp_port  = $this->input->post('smtp_port');
		$smtp_user  = $this->input->post('smtp_user');
		$smtp_pass  = $this->input->post('smtp_pass');

		$object = array(
			'protocol' => $protocol, 
			'smtp_host' => $smtp_host,
			'smtp_port' => $smtp_port,
			'smtp_user' => $smtp_user,
			'smtp_pass' => $smtp_pass

			);
		$this->db->where('id', '1');
		$this->db->update('email', $object);

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Email Settings Saved');
		redirect("admin/email", "refresh");
	}

	 /**
	  *  @Description: send a test email
	  *       @Params: _POST, email
	  *
	  *  	 @returns: success or fail
	  */
	public function test_email()
	{
		$this->load->model('Stuff_email');

		//get user's email address
		$userid = $this->session->userdata('userid');

		$this->load->model('Stuff_user');
		$email = $this->Stuff_user->get_user_email($userid);

		$this->Stuff_email->my_email($email,'admin@ignitedcms.com','Test from IgnitedCMS',"Congratulations,your email works");

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Please check your email.</strong>');

		redirect("admin/email", "refresh");


	}

}

/* End of file email.php */
/* Location: ./application/controllers/email.php */