<?php
class Admin_model extends CI_Model{
    
    
    function getToppings(){
        $this->db->select('tt_id,tt_type');
        $query  = $this->db->get('pizza_topping_types');
        return $query->result_array();
    }
    
    function getCrustTypes(){
        $this->db->select('pt_id,pt_crust_type');
        $query = $this->db->get('pizza_crust_types');
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
    function inProcessOrder($limit=0){
        if($limit==0){
        $query  = $this->db->query("select poi.*,pd.pd_type,pct.pt_crust_type from pizza_order_information poi, pizza_details pd,pizza_crust_types pct where oi_status=1 and poi.pd_id=pd.pd_id and poi.pt_id=pct.pt_id order by oi_id asc");
        return  $query->result_array();
        }
        else if($limit==1){
            $q="select 
                poi . *, pd.pd_type, pct.pt_crust_type,pci.ci_name,pci.ci_phone_no,pci.ci_email_address
            from
                pizza_order_information poi,
                    pizza_customer_information pci,
                pizza_details pd,
                pizza_crust_types pct
            where
                oi_status = 1 and poi.pd_id = pd.pd_id
                    and poi.pt_id = pct.pt_id
            and poi.oi_id=pci.oi_id
            order by poi.oi_id asc
            limit 5";
            $query  =   $this->db->query($q);
            return $query->result_array();
        }
    }
    function updateOrderStatus($orderId,$status){
        if($status==2){
        $query  = $this->db->query("UPDATE pizza_order_information SET oi_status=$status WHERE oi_id=$orderId");
        return $query;
        }
        else if($status=3){
            $query  = $this->db->query("UPDATE pizza_order_information SET oi_status=$status WHERE oi_id=$orderId");
            return $query;
        }
    }
    function completedOrder($limit=0){
        if($limit==0){
        $query  =   $this->db->query("select pci.*,poi.*,pd.pd_type,pt.pt_crust_type from pizza_customer_information pci,pizza_order_information poi, pizza_details pd, pizza_crust_types pt where poi.oi_status=2 and pci.oi_id=poi.oi_id and poi.pd_id=pd.pd_id and poi.pt_id=pt.pt_id order by poi.oi_id asc");
        return $query->result_array();
        }
        else if($limit=1){
            $q="select 
                    poi . *, pd.pd_type, pct.pt_crust_type,pci.ci_name,pci.ci_phone_no,pci.ci_email_address
                from
                    pizza_order_information poi,
                        pizza_customer_information pci,
                    pizza_details pd,
                    pizza_crust_types pct
                where
                    oi_status = 2 and poi.pd_id = pd.pd_id
                        and poi.pt_id = pct.pt_id
                and poi.oi_id=pci.oi_id
                order by poi.oi_id desc
                limit 5";
            $query  = $this->db->query($q);
            return $query->result_array();
        }
    }
    function cancelleddOrder(){
        $query  =   $this->db->query("select pci.*,poi.*,pd.pd_type,pt.pt_crust_type from pizza_customer_information pci,pizza_order_information poi, pizza_details pd, pizza_crust_types pt where poi.oi_status=3 and pci.oi_id=poi.oi_id and poi.pd_id=pd.pd_id and poi.pt_id=pt.pt_id order by poi.oi_id asc");
        return $query->result_array();
    }
    function countCompletedOrder(){
        $this->db->select('*')->from('pizza_order_information')->where('oi_status=2'); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }
    function countInprocessOrder(){
        $this->db->select('*')->from('pizza_order_information')->where('oi_status=1'); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }
     function countCancelledOrder(){
        $this->db->select('*')->from('pizza_order_information')->where('oi_status=3'); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }
}







?>