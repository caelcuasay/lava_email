
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

    // create data
    public function create($first_name, $last_name, $email, $password){      
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' =>$password,
            );

       return  $this->db->table('user_table')->insert($data);
     
    }

    public function verify($email){
     return $this->db->table('user_table')->where('email', $email)->get_all();

    }
    public function activate($email){
        $data = array(
            'status' => 'active',
            );
       return  $this->db->table('user_table')->where('email', $email)->update($data);
    }
   
}   
?>