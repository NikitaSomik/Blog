<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowController extends CI_Controller {


    public function index(){

//        $this->db->select('*');
//        $this->db->from('comments');
//        $query = $this->db->get();
        $title = 'Project';

        $this->load->view('show', $title);
    }


    public function show($id) {

        $query = $this->db->query("SELECT * FROM posts WHERE `id`='$id'");
        $query_post = $query->result();

//        foreach ($row as $data){
//            $d = (array)$data;
//        }
//SELECT * FROM posts JOIN comments ON comments.id = posts.comment_id JOIN users ON users.id = comments.user_id
//SELECT * FROM posts JOIN comments ON comments.id = posts.comment_id JOIN users ON users.id = comments.user_id WHERE posts.id = 57


//        $this->db->select('*');
//        $this->db->from('posts');
//        $this->db->join('comments', 'comments.id = posts.comment_id');
//        $this->db->join('users', 'users.id = comments.user_id');
//        $this->db->where('posts.id', $id);
//        //$this->db->where('posts.comment_id', 'posts.comment_id');
//        $query = $this->db->get();
//        $queries = $query->result();

//        $this->db->select('*');
//        $this->db->from('posts');
//        $this->db->join('users', 'users.id = posts.user_id');
//        $this->db->where('posts.id', $id);
//        $query = $this->db->get();
//        $query_users = $query->result();
        //print_r($query_users);

//SELECT * FROM posts JOIN comments ON comments.post_id = posts.id WHERE posts.id = 56

        $this->db->select('*');
        $this->db->from('comments');
        //$this->db->join('comments', 'comments.post_id = posts.id');
        $this->db->where('comments.post_id', $id);
        $query_comment = $this->db->get();
        $query_comment = $query_comment->result();



        //$commentss = makeArray($query_comment);
        //$com = json_encode($query_comment);
        //$this->load->view('show', array('rows' => $d, 'queries' => $queries, 'query_users' => $query_users));
        $this->load->view('show', array('query' => $query_post, 'com' => $query_comment));
    }

    public function message() {


        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[1]|required');
        $this->form_validation->set_rules('post_id', 'Post_id', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_id', 'User_id', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $post_id = $this->input->post('post_id');
            $comment = $this->input->post('comment');
            //$parent_id = $this->input->post('parent_id');


            $current_user = $this->session->name;
            $current_user_id = $this->session->id;

            $data_base = array(
                'user_id' => $this->session->id,
                'post_id' => $post_id,
                'comment' => $comment
                //'parent_id' => $parent_id?

            );
            $this->db->insert('comments', $data_base);
        }

        redirect('show/'.$post_id);
    }

}