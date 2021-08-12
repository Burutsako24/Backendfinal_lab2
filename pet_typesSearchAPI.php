<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class pet_typesSearchAPI extends REST_Controller {
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
            $this->load->model('pet_typesSearchModel');
            $this->load->helper("security"); 
            $stream = $this->security->xss_clean( $this->input->raw_input_stream );
            $data = json_decode(trim($stream), true);
            if(!empty($data["typeID "])){
                $search = $data["typeID "];
                $data = $this->pet_typesSearchModel->getbyID($typeID);
            }else if(!empty($data["typeName"])){
                $search = $data["typeName"];
                $data = $this->pet_typesSearchModel->getbyName($typeName);
            }else if(!empty($data["cactiveFlag"])){
                $search = $data["activeFlag"];
                $data = $this->pet_typesSearchModel->getbyactiveFlag($cactiveFlag);
            }else if(!empty($data["typeGroup"])){
                $search = $data["typeGroup"];
                $data = $this->pet_typesSearchModel->getbyGroup($typeGroup);
            }else if(!empty($data["typeDetail"])){
                $search = $data["typeDetail"];
                $data = $this->pet_typesSearchModel->getbyDetail($typeDetail);
            }
            $msg = array("Status"=>"success", "Message"=>"Search Success","data"=>$data);
            $this->response($msg, REST_Controller::HTTP_OK);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $msg = array("Status"=>"error", "Message"=>$e->getMessage());
            $this->response($msg, REST_Controller::HTTP_OK);
        }
        
	}
    	
}