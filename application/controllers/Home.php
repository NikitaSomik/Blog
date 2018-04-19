<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->model('user_model');
        $this->load->model('home_model');

        //$data['users'] = $this->user_model->get_user();
        $data['posts'] = $this->home_model->get_post();
        //$data['users'] = $this->home_model->get_users();

        //var_dump($data['users']);
        //var_dump($query->result());
        //$this->load->view('home', array('test' => $query->result()));
        //$this->load->view('home', array('users' => $this->user_model->get_user(), 'posts' => $this->home_model->get_post()));
        //var_dump($data);
        //$this->load->view('home', $data);
        $this->load->view('home', $data);
    }

    public function logout_user() {
        unset(
            $_SESSION['name'],
            $_SESSION['userAuthorized']

        );
        redirect(base_url());
    }

    public function form_posts() {

        //echo json_encode($_FILES["file_content"]['name']);
        //echo json_encode($_POST['title']);

        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[1]|max_length[1000]');


            if ($this->form_validation->run() == TRUE) {

                $title = $this->input->post('title');
                $content = $this->input->post('content');

                if (isset($_FILES["file_content"]["name"]) && !empty($_FILES["file_content"]["name"])){

                    $config['upload_path']      = './assets/uploads';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload('file_content'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);

                    }
                    else
                    {

                        $current_user = $this->session->name;
                        $current_user_id = $this->session->id;

                        $data = array(
                            'name' => $this->session->name,
                            'title' => $title,
                            'content' => $content,
                            'upload_data' => $this->upload->data(),
                            'data' => time()
                        );

                        $image_path = $this->upload->data();

                        $data_base = array(
                            'title' => $title,
                            'post_url' => '1123123123123',
                            'post_content'  => $content,
                            'post_image'  => base_url("assets/uploads/".$image_path['raw_name'].$image_path['file_ext']),
                            'user_id' => $current_user_id
                            //'date'  => 'My date'
                        );

                        $this->db->insert('posts', $data_base);
                        echo json_encode($data);

                    }
                }
                else {

                    $current_user = $this->session->name;
                    $current_user_id = $this->session->id;

                    $data_base = array(
                        'title' => $title,
                        'post_url' => '1123123123123',
                        'post_content'  => $content,
                        'post_image'  => '',
                        'user_id' => $current_user_id
                        //'date'  => 'My date'
                    );
                    $this->db->insert('posts', $data_base);

                    $data = array(
                        'name' => $this->session->name,
                        'title' => $title,
                        'content' => $content
                    );

                    echo json_encode($data);
                }
            }
        }
    }

    public function update_posts() {

//        $edit_title = $this->input->post('edit_title');
//        $edit_content = $this->input->post('edit_content');


//        $data_base = array(
//            'title' => $edit_title,
//            'post_url' => '1123123123123',
//            'post_content'  => $edit_content,
//            'post_image'  => '',
//            'user_id' => $current_user_id
//            //'date'  => 'My date'
//        );



        if (!empty($_POST['edit_title']) && !empty($_POST['edit_content'])) {

            $this->form_validation->set_rules('edit_title', 'Title', 'trim|required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('edit_content', 'Content', 'trim|required|min_length[1]|max_length[1000]');


            if ($this->form_validation->run() == TRUE) {

                $edit_title = $this->input->post('edit_title');
                $edit_content = $this->input->post('edit_content');
                $edit_post_id = $this->input->post('edit_post_id');

                if (isset($_FILES["edit_file_content"]["name"]) && !empty($_FILES["edit_file_content"]["name"])){

                    $config['upload_path']      = './assets/uploads';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload('edit_file_content'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);

                    }
                    else
                    {

                        $current_user = $this->session->name;
                        $current_user_id = $this->session->id;

                        $data = array(
                            'name' => $this->session->name,
                            'title' => $edit_title,
                            'content' => $edit_content,
                            'upload_data' => $this->upload->data(),
                            //'data' => time()
                            'edit_post_id' => $edit_post_id
                        );

                        $image_path = $this->upload->data();

                        $data_base = array(
                            'title' => $edit_title,
                            'post_url' => '1123123123123',
                            'post_content'  => $edit_content,
                            'post_image'  => base_url("assets/uploads/".$image_path['raw_name'].$image_path['file_ext']),
                            'user_id' => $current_user_id
                            //'date'  => 'My date'
                        );



                        $this->db->where('id', $edit_post_id);
                        $this->db->update('posts', $data_base);
                        echo json_encode($data);

                    }
                }
                else {

                    $current_user = $this->session->name;
                    $current_user_id = $this->session->id;


                    $data_base = array(
                        'title' => $edit_title,
                        'post_url' => '1123123123123',
                        'post_content'  => $edit_content,
                        'post_image'  => '',
                        'user_id' => $current_user_id
                        //'date'  => 'My date'
                    );
                    $this->db->where('id', $edit_post_id);
                    $this->db->update('posts', $data_base);

                    $data = array(
                        'name' => $this->session->name,
                        'title' => $edit_title,
                        'content' => $edit_content,
                        'edit_post_id' => $edit_post_id
                    );

                    echo json_encode($data);
                }
            }
        }

    }
}


?>




