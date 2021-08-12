<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class pet_typesAPI extends REST_Controller {
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
    public function index_post()
    {
        try {
            $this->load->model('pet_typesModel');
            $this->load->helper("security"); 
            $stream = $this->security->xss_clean( $this->input->raw_input_stream );
            $data = json_decode(trim($stream), true);
            if(!empty($data["typeID"])){
                $ststus = $this->pet_typesModel->insert($data);
                $msg = array("Status"=>$ststus["Status"], "Message"=>$ststus["Message"],"data"=>array());
            }else{
                $msg = array("Status"=>"error", "Message"=>"Data is not complete","data"=>array());
            }
            $this->response($msg, REST_Controller::HTTP_OK);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $msg = array("Status"=>"error", "Message"=>$e->getMessage());
            $this->response($msg, REST_Controller::HTTP_OK);
        }
    } 
     

}