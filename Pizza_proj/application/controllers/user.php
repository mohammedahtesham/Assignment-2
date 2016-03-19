<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }
    public function index(){
        $data['pagecontent']="user/home";
        
        $this->load->view("common/holder",$data);
    }
    public function order(){
        $data['pagecontent']    ="user/order";
        $data['allCrust']       = $this->user_model->getCrustTypes();
        $data['allTopping']    = $this->user_model->getToppings();
        $data['allDetails']     = $this->user_model->getPrizzaDetails();
        $this->load->view('common/holder',$data);
    }
     public function process(){
        
       if($this->input->post("quantity")){
           //$pizzaId = 0;
           $insertArray=array();
          if($this->input->post("P1")!=0){
               $insertArray['pd_id']=$this->input->post("P1");
           }
           else if($this->input->post("P2")!=0){
               $insertArray['pd_id']=$this->input->post("P2");
           }
           else if($this->input->post("P3")!=0){
               $insertArray['pd_id']=$this->input->post("P3");
           }
           else if($this->input->post("P4")!=0){
               $insertArray['pd_id']=$this->input->post("P4");
           }
           $insertArray['tt_ids']     =   $this->input->post("top");
           $insertArray['pt_id']   =   $this->input->post('crust');
           $insertArray['oi_quantity']       =   $this->input->post("quantity");
           $insertArray['oi_status']    =   1;
           $insertArray['oi_ordered_by']    =   "Guest-User";
           $totalAmount =   0  ;
           $perPrizzaAmount =   $this->user_model->getPrizzaDetails($insertArray['pd_id']);
           $insertArray['oi_base_amount']= $perPrizzaAmount->pd_price;
           $insertArray['oi_total_amount']     =   ($insertArray['oi_base_amount']*$insertArray['oi_quantity']);
           $orderId =   $this->user_model->insertOrder($insertArray);
           
           if($orderId!=0){
           $this->session->set_userdata("orderId",$orderId);
           //echo $orderId
           
           return 1;
           
           }
           
           
           
           
       }
        
    }
    public function processing(){
        $orderId    = $this->session->userdata['orderId'];
        $order      =   $this->user_model->orderDetails($orderId);
        $data['stateAll']   =   $this->user_model->stateDetails();
        $data['order']  =   $order->oi_total_amount;
        $data['pagecontent']    =   "user/processing";
        
        $this->load->view("common/holder",$data);
    }
    public function ajaxState(){
        //if(isset($this->input->post('state'))){
            $state=$this->input->post('state');
            $taxPercentage  =   $this->user_model->stateDetails($state);
            echo  $taxPercentage->sm_tax_per;
        //}
    }
    public function processOrder(){
          if($this->input->post('state')){
           $this->form_validation->set_rules('customer','CUSTOMER NAME','required');
           $this->form_validation->set_rules('phone','PHONE NUMBER','required');
           $this->form_validation->set_rules('email','E-MAIL','required');
           $this->form_validation->set_rules('pin','POSTTAL CODE','required');
           $this->form_validation->set_rules('pin','PROVINCE','required');
           if($this->form_validation->run()==TRUE)
           {
       $baseAmt =   $this->input->post("baseAmt");
       $taxAmt  =   $this->input->post("taxamount");
       $totalAmt=   $this->input->post("total");
       $customerName    = $this->input->post("customer");
       $phone =   $this->input->post("phone");
       $email =   $this->input->post("email");
       $add  =   $this->input->post("address");
       $pin  =   $this->input->post("pin");
       $stateId  =   $this->input->post("state");
       
       $orderId = $this->session->userdata("orderId");
       $processFlag =   $this->user_model->insertCustomerDetails($customerName,$add,$pin,$stateId,$phone,$email,$orderId);
       $updateTax   = $this->user_model->updateOrderDetails($taxAmt,$totalAmt,$orderId);
       
       if($processFlag==1 && $updateTax==1){
           $this->session->unset_userdata('orderId');
           $this->session->set_userdata('flag',1);
           redirect(base_url()."index.php/user/");
       }
         }
           else
           {
               $this->session->set_userdata('Error',"<strong>ERROR :</strong>Please fill the required fields *");
               redirect(base_url()."index.php/user/processing");
           }
       }
       else{
          
           $this->session->set_userdata('Error',"<strong>ERROR :</strong>Please fill the required fields *");
            redirect(base_url()."index.php/user/processing");
       }
       
    }
    
}







?>