<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowController extends CI_Controller {


    public function index(){

//        $this->db->select('*');
//        $this->db->from('comments');
//        $query = $this->db->get();
//
//        $this->load->view('show', array('comments' => $query));
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
        $query_comment = $query_comment->result_array();

        //var_dump($query_comment);
//        foreach ($query_comment as $arc){
//
//            //печатаем коммент
//            if (is_null($arc)){
//                // закрываем div
//                continue;
//            }
//            // печатаем дочерние комменты
//
//            $child_ids = explode(",", $arc['child']);
//            // отфильтровываем комментарие по childs_id из массива общего
//
//            $childs = filter($query_comment, $child_ids);
//            // открываем div childs
//
//            print_com($childs);
//
//
//        }


//


//         function makeArray($q_comment){
//             $childs=[];
//
//            foreach($q_comment as $comment){
//                $childs[$comment->parent_id][]=$comment;
//            }
//
//            foreach($q_comment as $comment){
//                if(isset($childs[$comment->id]))
//                    $comment->childs=$childs[$comment->id];
//
//            }
//            //dd(count($childs));
//            if(count($childs)>0){
//                $tree=$childs[0];
//            }
//            else {
//
//                $tree=[];
//            }
//            return $tree;
//          }

        //$commentss = makeArray($query_comment);

        //$this->load->view('show', array('rows' => $d, 'queries' => $queries, 'query_users' => $query_users));
        $this->load->view('show', array('query' => $query_post, 'comments' => $query_comment));
    }





}