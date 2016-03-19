<?php

class User_model extends CI_Model{
     function getCrustTypes(){
        $this->db->select('pt_id,pt_crust_type');
        $query = $this->db->get('pizza_crust_types');
        return $query->result_array();
    }
      function getToppings(){
        $this->db->select('tt_id,tt_type');
        $query  = $this->db->get('pizza_topping_types');
        return $query->result_array();
    }
    function getPrizzaDetails($pizzaId=0){
        if($pizzaId==0){
        $this->db->select('pd_id,pd_price,pd_type');
        $query  =   $this->db->get('pizza_details');
        return $query->result_array();
        }
        else{
            $query=$this->db->query("SELECT pd_price FROM pizza_details WHERE pd_id='".$pizzaId."'");
            return $query->row();
        }
    }
     function insertOrder($insertArray=array()){
        if(count($insertArray)>0){
        $this->db->trans_start();
        $this->db->insert('pizza_order_information', $insertArray);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
        }
    }
    function orderDetails($orderId){
        $query  =   $this->db->query("SELECT oi_total_amount FROM pizza_order_information WHERE oi_id='".$orderId."'");
        return $query->row();
    }
    function stateDetails($stateId=0){
        if($stateId==0){
            $this->db->select('sm_id,sm_name');
            $query  =   $this->db->get("pizza_state_master");
            return $query->result_array();
        }
        else{
            $query  = $this->db->query("SELECT sm_tax_per FROM pizza_state_master WHERE sm_id='".$stateId."'");
            return $query->row();
        }
    }
     function insertCustomerDetails($customerName,$add,$pin,$stateId,$phone,$email,$orderId){
        $ins    ="INSERT INTO `pizza_customer_information`(`ci_name`, `ci_address`, "
                . "`ci_postal_code`, `ci_province_id`, `ci_phone_no`, `ci_email_address`,"
                . " `oi_id`) VALUE("
                . "'".$customerName."','".$add."','".$pin."','".$stateId."','".$phone."','".$email."','".$orderId."')";
        $query  =   $this->db->query($ins);
        return $query;
    }
    function updateOrderDetails($taxAmt,$totalAmt,$orderId){
        $ins    =   "UPDATE pizza_order_information SET oi_tax_amount='".$taxAmt."',oi_total_amount='".$totalAmt."' WHERE oi_id='".$orderId."'";
        $query  =   $this->db->query($ins);
        return $query;
    }
    
    
    
}






?>