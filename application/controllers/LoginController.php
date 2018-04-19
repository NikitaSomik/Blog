<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function index()
    {
        if (isset($_POST['login'])) {


            $this->load->model('Login_model');
            $user = $this->Login_model->check_valid_auth();

            //var_dump($user);
            if ($user) {

                $this->session->set_flashdata("success", "You are logged in!");

                $newdata = array(
                    'userAuthorized' => TRUE,
                    'name' => $user->name,
                    'id' => $user->id,
                    'email' => $user->email
                );

                $this->session->set_userdata($newdata);

                redirect(base_url());

            } else {

                $this->session->set_flashdata("error", "No such account exists in database.");

            }
        }

        $this->load->view('auth/login');
    }


    public function check_email()
    {

        if (isset($_POST['email'])) {

            $this->load->model('Login_model');
            $query = $this->Login_model->check_email_auth();


            if ($query->row()){

                    echo json_encode(['success'=>'Record added successfully.']);
            }
            else {

                echo json_encode(['error']);
            }


//            else {
//                $errors = validation_errors();
//                echo json_encode(['error'=>$errors]);
//            }
        }
    }
}

?>