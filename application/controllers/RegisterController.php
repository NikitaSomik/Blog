<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {



    public function index() {

        if (isset($_POST['register'])) {

//            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[32]');
//            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');
//            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[32]|is_unique[users.email]');
//
//            if ($this->form_validation->run() == TRUE) {
//
//                $data = array(
//                    'name' => $_POST['name'],
//                    'password' => $_POST['password'],
//                    'email' => $_POST['email'],
//                    'created_date' => date('Y-m-d-h-i-s')
//                );
//
//                $this->db->insert('users', $data);
//
//                redirect('login');
//            }
//            else {
//                //echo $errors = validation_errors();
//            }

            $this->load->model('Register_model');
            $reg_user = $this->Register_model->register();

            if (!empty($reg_user)) {
                $this->db->insert('users', $reg_user);

                redirect('login');
            }
            else {
                //echo $errors = validation_errors();
            }

        }


        $this->load->view('auth/register');
    }

    public function checking_email() {
        //var_dump($_POST['email']);
        //echo json_encode($_POST['email']);
        if (isset($_POST['email'])) {
            //echo json_encode($_POST['email']);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[32]');


            if ($this->form_validation->run() == TRUE) {

                $email = $this->input->post('email');

                $this->db->select('email');
                $this->db->from('users');
                $this->db->where('email', $email);
                $query = $this->db->get();

                //echo json_encode($query->result());
                if ($query->result()){
                    //$errors = validation_errors();
                    echo json_encode(['error']);
                }
                else {
                    echo json_encode(['success'=>'Record added successfully.']);

                }
            }

//            else {
//                $errors = validation_errors();
//                echo json_encode(['error'=>$errors]);
//            }
        }
    }
}

?>
