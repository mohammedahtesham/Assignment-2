<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("admin_model");
         $this->load->helper('security');
        if(!$this->session->userdata('is_logged_in')){
            redirect(base_url()."index.php/login");  
            
        }
    }
    public function index(){
        $data['pagecontent']="admin/dashboard";
        $data['complete']   = $this->admin_model->countCompletedOrder();
        
        $data['inprocess']   = $this->admin_model->countInprocessOrder();
        $data['cancelled']   = $this->admin_model->countCancelledOrder();
        $data['allInProcess']   =   $this->admin_model->inProcessOrder(1);
        $data['allComplete']    = $this->admin_model->completedOrder(1);
        $this->load->view('common/holder',$data);
    }
    public function addOrder(){
        $data['pagecontent']    ="admin/addOrder";
        $data['allCrust']       = $this->admin_model->getCrustTypes();
        $data['allTopping']    = $this->admin_model->getToppings();
        $data['allDetails']     = $this->admin_model->getPrizzaDetails();
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
           $totalAmount =   0  ;
           $perPrizzaAmount =   $this->admin_model->getPrizzaDetails($insertArray['pd_id']);
           $insertArray['oi_base_amount']= $perPrizzaAmount->pd_price;
           $insertArray['oi_total_amount']     =   ($insertArray['oi_base_amount']*$insertArray['oi_quantity']);
           $orderId =   $this->admin_model->insertOrder($insertArray);
           
           if($orderId!=0){
           $this->session->set_userdata("orderId",$orderId);
           //echo $orderId
           
           return 1;
           
           }
           
           
           
           
       }
        
    }
    public function processing(){
        $orderId    = $this->session->userdata['orderId'];
        $order      =   $this->admin_model->orderDetails($orderId);
        $data['stateAll']   =   $this->admin_model->stateDetails();
        $data['order']  =   $order->oi_total_amount;
        $data['pagecontent']    =   "admin/processing";
        
        $this->load->view("common/holder",$data);
    }
    public function ajaxState(){
        //if(isset($this->input->post('state'))){
            $state=$this->input->post('state');
            $taxPercentage  =   $this->admin_model->stateDetails($state);
            echo  $taxPercentage->sm_tax_per;
        //}
    }
    public function processOrder(){
        //$this->load->helper(array('form', 'url'));
        //$this->load->library('form_validation');
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
            $processFlag =   $this->admin_model->insertCustomerDetails($customerName,$add,$pin,$stateId,$phone,$email,$orderId);
            $updateTax   = $this->admin_model->updateOrderDetails($taxAmt,$totalAmt,$orderId);

                     if($processFlag==1 && $updateTax==1){
                         $this->session->unset_userdata('orderId');
                         redirect(base_url()."index.php/admin/inProcess");
                      }
           }
           else
           {
               $this->session->set_userdata('Error',"<strong>ERROR :</strong>Please fill the required fields *");
               redirect(base_url()."index.php/admin/processing");
           }
       }
       else{
          
           $this->session->set_userdata('Error',"<strong>ERROR :</strong>Please fill the required fields *");
            redirect(base_url()."index.php/admin/processing");
       }
    }
    public function inProcess(){
        $data['pagecontent']="admin/inProcess";
        $data['allOrder']   = $this->admin_model->inProcessOrder();
        $this->load->view("common/holder",$data);
    }
    public function completedOrder($orderId=0){
        if($orderId!=0){
            $orderStatus    = $this->admin_model->updateOrderStatus($orderId,2);
            if($orderStatus==1){
                 redirect(base_url()."index.php/admin/inProcess");
            }
        }
    }
     public function cancelOrder($orderId=0){
        if($orderId!=0){
            $orderStatus    = $this->admin_model->updateOrderStatus($orderId,3);
            if($orderStatus==1){
                 redirect(base_url()."index.php/admin/inProcess");
            }
        }
    }
    public function complete(){
        $data['pagecontent']    =   "admin/complete";
        $data['completedOrder'] = $this->admin_model->completedOrder();
        $this->load->view("common/holder",$data);
    }
     public function cancelled(){
        $data['pagecontent']    =   "admin/cancelled";
        $data['cancelledOrder'] = $this->admin_model->cancelleddOrder();
        $this->load->view("common/holder",$data);
    }
}





?>