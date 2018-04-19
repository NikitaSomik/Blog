<?php

class Register_model extends  CI_Model {

    public function register() {

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[32]|is_unique[users.email]');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'created_date' => date('Y-m-d-h-i-s')
            );

            return $data;
        }
        else {
            //echo $errors = validation_errors();
        }
    }
}


?>