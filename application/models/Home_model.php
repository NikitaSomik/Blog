<?php
ob_start();

class Home_model extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function put_posts(){

//        if (!empty($_POST['title']) && !empty($_POST['content'])) {
//
//            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[100]');
//            $this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[1]|max_length[500]');
//
//
//            if ($this->form_validation->run() == TRUE) {
//
//                $title = $this->input->post('title');
//                $content = $this->input->post('content');
//
//                if (isset($_FILES["file_content"]["name"]) && !empty($_FILES["file_content"]["name"])){
//
//                    $config['upload_path']      = './assets/uploads';
//                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
//
//                    $this->load->library('upload', $config);
//
//
//                    if (!$this->upload->do_upload('file_content'))
//                    {
//                        $error = array('error' => $this->upload->display_errors());
//                        echo json_encode($error);
//
//                    }
//                    else
//                    {
//
//                        $current_user = $this->session->name;
//                        $current_user_id = $this->session->id;
//
//                        $data = array(
//                            'name' => $this->session->name,
//                            'title' => $title,
//                            'content' => $content,
//                            'upload_data' => $this->upload->data(),
//                            'data' => time()
//                        );
//
//                        $data_base = array(
//                            'title' => $title,
//                            'post_url' => '1123123123123',
//                            'post_content'  => $content,
//                            'post_image'  => '',
//                            'user_id' => $current_user_id
//                            //'date'  => 'My date'
//                        );
//
//                        $this->db->insert('posts', $data_base);
//                        echo json_encode($data_base);
//                        //echo json_encode($data);
//                        //$this->load->view('upload_success', $data);
//                    }
//                }
//                else {
//
//                    $current_user = $this->session->name;
//                    $current_user_id = $this->session->id;
//
//                    $data_base = array(
//                        'title' => $title,
//                        'post_url' => '1123123123123',
//                        'post_content'  => $content,
//                        'post_image'  => '',
//                        'user_id' => $current_user_id
//                        //'date'  => 'My date'
//                    );
//                    $this->db->insert('posts', $data_base);
//
//                    $data = array(
//                        'name' => $this->session->name,
//                        'title' => $title,
//                        'content' => $content
//                    );
//
//                    echo json_encode($data);
//                }
//            }
//        }

    }

    public function get_post() {

        $this->db->select('*');
        $get_posts = $this->db->get('posts');
        return $get_posts->result_array();

    }
   // public function get_users() {

        //$user_current = $this->session->name;

//        $this->db->select('*');
//        $this->db->from('users');
//        $this->where();
//        $get_users = $this->db->get();
//        return $get_users->result_array();


        //$user_current = $this->session->email;
        //var_dump($user_current);
        //if ($user_current) {
//            $this->db->select('*');
//            $this->db->from('users');
//            $this->db->where('email', $user_current);
//            $get_users = $this->db->get();
//            return $get_users->result_array();
            //}



    //}
}

?>