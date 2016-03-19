<?php 
class Login_model extends CI_Model{
    
    
     function selectuser($username,$password)
    {
        $this->db->select('*');
        $this->db->from('pizza_users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query  = $this->db->get();
        
        return $query;
    }
}







?>