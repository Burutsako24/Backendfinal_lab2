<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class pet_typesgetallAPI extends REST_Controller {
    public $dada;
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get()
	{
        try {
            $this->load->model('pet_typesgetallModel');
            $this->load->helper("security"); 
            $stream = $this->security->xss_clean( $this->input->raw_input_stream );
            $data = json_decode(trim($stream), true);
           
            $data = $this->pet_typesgetallModel->getpet_typesAll();
           
            $msg = array("Status"=>"success", "Message"=>"","data"=>$data); 
            $this->response($msg, REST_Controller::HTTP_OK);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $msg = array("Status"=>"error", "Message"=>$e->getMessage());
            $this->response($msg, REST_Controller::HTTP_OK);
        }
        
	}
}