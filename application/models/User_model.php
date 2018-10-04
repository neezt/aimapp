<?php

class User_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()   {
          $this->load->database(); 
        }

        public function get_login($email)
        {
                $this->db->select('*');
                $this->db->from('user');       
                $this->db->where('email',$email);
                $query = $this->db->get();

                return $query->result();
        }

        public function get_menuByUser($id)
        {
                $this->db->select('menu.*');
                $this->db->from('menu');
                $this->db->join('permission', 'permissions.id_menu=menu.id');       
                $this->db->where('permission.id_user',$id);
                $query = $this->db->get();

                return $query->result();
        }

        public function get_permissionMenu($user,$menu)
        {
                $this->db->select('read,create_edit,delete');
                $this->db->from('permission');
                $this->db->where('permission.id_user',$user);
                $this->db->where('permission.id_menu',$menu);
                $query = $this->db->get();

                return $query->result();
        }

        public function get_users_count($search)
        {
                $this->db->select(' user.id user_id, user.name ,user.email, user.picture');
                $this->db->from('user');
                if(!empty($search)){
                    $this->db->like('user.id',$search)
                    ->or_like('user.name',$search);
                }
                $query = $this->db->get();
                return $query->num_rows();
        }

        public function get_users($search,$limit,$start,$col,$dir)
        {
                $this->db->select(' user.id user_id, user.name ,user.email, user.picture');
                $this->db->from('user');

                if(!empty($search)){
                    $this->db->like('users.id',$search)
                    ->or_like('users.name',$search);
                }

                $query = $this->db->limit($limit,$start)
                                 ->order_by($col,$dir)
                                 ->get();

                return $query->result();
        }

        public function get_user_id($id)
        {
                $this->db->select(' user.id user_id, user.name ,user.email, user.picture, deparment.name deparment,user.code');
                $this->db->from('user');
                $this->db->join('deparment', 'deparment.id=user.id_deparment');
                $this->db->where('user.id',$id);
                
                $query = $this->db
                                 ->get();

                return $query->result();
        }

        public function get_user_code($code)
        {
                $this->db->select(' u.name ,u.email, u.picture, l1.name language1,l2.name language2,l3.name language3,deparment.picture pic_dep');
                $this->db->from('user u');
                $this->db->join('language l1', 'l1.id=u.id_language');
                $this->db->join('language l2', 'l2.id=u.id_language');
                $this->db->join('language l3', 'l3.id=u.id_language');
                $this->db->join('deparment', 'deparment.id=u.id_deparment');
                $this->db->where('u.code',$code);
                
                $query = $this->db
                                 ->get();

                return $query->result();
        }

        public function insert_user($member)
        {
                $this->db->insert('users', $member);
                 $insert_id = $this->db->insert_id();

                return  $insert_id;
        }

        public function update_user($member)
        {
                
                $this->db->update('users', $member, array('id' => $member['id']));
        }

}