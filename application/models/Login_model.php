<?php
ob_start();

class Login_model extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_valid_auth()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == TRUE) {

        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email' => $email, 'password' => $password));
        $query = $this->db->get();

        $user = $query->row();
        return $user;
        }

    }

    public function check_email_auth()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[32]');

        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('email');

            $this->db->select('email');
            $this->db->from('users');
            $this->db->where('email', $email);
            $query = $this->db->get();

            return $query;
        }
    }
}

?>



