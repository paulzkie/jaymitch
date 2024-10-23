<?php
public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
	public function index()
	{

		$this->jayandmitch->verifyUser($this->input->get('userid'));

		echo "<script>alert('You have successfully verify your account. You may now login your account.');
		window.location.href='index.php';
		</script>";

	}
?>