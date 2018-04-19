<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'modal_window.html';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Post</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
            <!--            <li><a href="#">Page 1</a></li>-->
            <!--            <li><a href="#">Page 2</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            //var_dump($results);
            if ($this->session->has_userdata('userAuthorized')) { ?>
                <!--                <li><a href=""><span style="font-size: 20px;font-weight: 400; color: white;">--><?php //echo $this->session->name ;
                ?><!--</span></span></a></li>-->
                <li><a href="#" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart"
                                                                           aria-hidden="true"></i> Posts</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span style="font-size: 20px;font-weight: 500; color: white;"> <?php echo $this->session->name; ?>
                            <span class="caret"></span></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php base_url(); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="logout" method="POST" style="display: none;">

                            </form>
                        </li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="<?php echo base_url(); ?>register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href=<?php echo base_url(); ?>login><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>



    <div class="container">
        <div class="row">
            <?php //var_dump($quer);

                foreach ($query as $q):
            ?>
            <div class="col-md-12">
                <div class="cont">
                    <div class="img_cl"><img src="<?php echo $q->post_image ?>" style="width: 100%;" alt=""></div>
                    <h3 class="title_cl" style="text-align: center;"><?php echo $q->title; ?></h3>
                    <p style="margin-bottom: 50px;"><?php echo $q->post_content; ?></p>
                </div>
            </div>
        </div>
            <?php
endforeach;
?>
<!--            <div class="col-md-12">-->
<!--                <div class="panel panel-info main">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="panel-title">By --><?php ////echo $query->name; ?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="pull-right"></div>-->
<!--                    <div class="panel-body">--><?php ////echo  $query->comment; ?><!--</div>-->
<!---->
<!--                    <div class="panel-footer" align="right">-->
<!---->
<!--                        <a href="#" class="btn btn-default edit" id="">Edit</a>-->
<!---->
<!--                        <a href="#" class="btn btn-default Reply" id="">Reply</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->






        <?php


     function filter($arr22, $ids) {
    $ret_arr = array();
    foreach($arr22 as $val){
        foreach($ids as $id) {

                if($val['id'] == $id){
                   //var_dump($val['id']);
                    array_push($ret_arr, $val);
                    //echo 'yes';

                }
            else{
                //echo 'No';-->
                }
        }
    }
    //global $test333;
         //$test333 = $ret_arr;
    return $ret_arr;
}


//array(
//        0=>array(
//            'childs'=>array(
//                 0=>array(),
//                 1=>array(
//                         'childs'=>array();
//                 )
//            )
//        ),
//        1=>array(),
//        2=>array(
//                'childs'=>array()
//        )
//);

//print_r($comments);


        $arr2 = array();

foreach ($comments as $id => $value) {


    //$value['parent_id'] !== 0){
        $arr2[$value['parent_id']][] = $value;

    //}
}

//var_dump($arr2);

function tree_build($comm, $parentt){

    $out = array();
//    if (!isset($arr[$parentt])){
//
//    }

    foreach ($comm as $ids => $row) {

        if ($ids == 0){

            foreach ($row as $qqq) {

                ?>
                <div class="child">
                    <div class="panel panel-info main" style="margin-left: 20px;">
                        <div class="panel-heading">
                            <div class="panel-title">By</div>
                        </div>
                        <div class="pull-right"></div>
                        <div class="panel-body"><?php echo $qqq['comment']; ?></div>

                        <div class="panel-footer" align="right">

                            <a href="#" class="btn btn-default edit" id="">Edit</a>

                            <a href="#" class="btn btn-default Reply" id="">Reply</a>
                        </div>

                    </div>
                </div>

                <?php
            }
        }
        elseif ($ids !== 0) {
            //var_dump($row);
            //var_dump($comm);
            foreach ($row as $v){
                //var_dump($v['id']);
                //var_dump($v['parent_id']);
                //var_dump($ids);
                if ($ids == $v['parent_id']*1){
                    var_dump($ids);
                    ?>
                    <div class="child">
                    <div class="panel panel-info main" style="margin-left: 50px;">
                        <div class="panel-heading">
                            <div class="panel-title">By</div>
                        </div>
                        <div class="pull-right"></div>
                        <div class="panel-body"><?php echo $v['comment']; ?></div>

<div class="panel-footer" align="right">

    <a href="#" class="btn btn-default edit" id="">Edit</a>

    <a href="#" class="btn btn-default Reply" id="">Reply</a>
</div>

</div>
</div>
    <?php

                }
            }

            //var_dump($row);
//        $childs = tree_build($comments, $row['id']);
//
//        if ($childs) $row['childs'] = $childs;
//        $out[] = $row;
        }
    }
    //return $out;
}

print_r(tree_build($arr2 ,0));










//function tree($com)
//{
//    //$arr = $array();
//    foreach ($com as $id => $value) {
//
//        $arr_parent = array();
//        $arr = array();
//
//
//
//
//        if ($value['parent_id'] == 0) {
//
//            $arr_parent[$value['parent_id']] = $value;
//            //var_dump($arr_parent[$value['parent_id']]);
//            ?>
<!--            <div class="child">-->
<!--            <div class="panel panel-info main"  style="margin-left: 20px;">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="panel-title">By </div>-->
<!--                </div>-->
<!--                <div class="pull-right"></div>-->
<!--                <div class="panel-body">--><?php //print_r($arr_parent[$value['parent_id']]['comment']); ?><!--</div>-->
<!---->
<!--                <div class="panel-footer" align="right">-->
<!---->
<!--                    <a href="#" class="btn btn-default edit" id="">Edit</a>-->
<!---->
<!--                    <a href="#" class="btn btn-default Reply" id="">Reply</a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--            </div>-->
<!--            --><?php
//        } elseif ($value['parent_id'] !== 0) {
//            //$arr[$value['parent_id']] = $value;
//
//            foreach ($com as $id_post) {
//                if ($id_post['parent_id'] == $value['parent_id']){
//
//
//                ?>
<!--                <div class="panel panel-info main" style="margin-left: 50px;">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="panel-title">By</div>-->
<!--                    </div>-->
<!--                    <div class="pull-right"></div>-->
<!--                    <div class="panel-body">--><?php //echo $id_post['comment'] ; ?><!--</div>-->
<!---->
<!--                    <div class="panel-footer" align="right">-->
<!---->
<!--                        <a href="#" class="btn btn-default edit" id="">Edit</a>-->
<!---->
<!--                        <a href="#" class="btn btn-default Reply" id="">Reply</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                --><?php
//                }
//            }
//            //var_dump($arr);
//        }
//    }
//}
?>



    <div class="row">
        <div class="col-md-12">
                <?php
                //print(tree($comments));
                //print(print_com($comments)); ?>
            </div>
        </div>
    </div>



<?php

//        function print_com($arr) {
//            $test="";
//            // $test=$childs;
//            $html = '';
//            foreach ($arr as $arc){
//
//                if (!$arc['is_child']) {
//
//
//                    $html .= '<div class="panel panel-info main">';
//                    $html .= '<div class="panel-heading">';
//                    $html .= '<div class="panel-title">By </div>';
//                    $html .= '</div>';
//                    $html .= '<div class="pull-right"></div>';
//                    $html .= '<div class="panel-body">' . $arc['comment'] . '</div>';
//                    $html .= '<div class="panel-footer" align="right">';
//                    $html .= '<a href="#" class="btn btn-default edit" id="">Edit</a>';
//                    $html .= '<a href="#" class="btn btn-default Reply" id="">Reply</a>';
//                    $html .= '</div>';
//                    $html .= '</div>';
//                }
//                if (!is_null($arc['child'])){
//
//                    $child_ids = explode(",", $arc['child']);
//                    //var_dump($child_ids);
//                    // отфильтровываем комментарие по childs_id из массива общего
//
//                    $childs = filter($arr, $child_ids);
//                    // открываем div childs
//
//                    $html .= '<div class="childs" style="margin-left: 50px; ">';
//                    //global $test333;
//
//                    //if ($test333 != $childs) {
//                    $html .= print_com($childs);
//                    //}
//                    $html .= '</div>';
//
//                }
//
//
//
//
//            }
//            return $html;
//        }


        ?>










<!--            function print_com($arr) {-->
<!--          $test="";-->
<!--               // $test=$childs;-->
<!--                $html = '';-->
<!--                foreach ($arr as $arc){-->
<!---->
<!--                if (!$arc['is_child']) {-->
<!---->
<!---->
<!--                    $html .= '<div class="panel panel-info main">';-->
<!--                    $html .= '<div class="panel-heading">';-->
<!--                    $html .= '<div class="panel-title">By </div>';-->
<!--                    $html .= '</div>';-->
<!--                    $html .= '<div class="pull-right"></div>';-->
<!--                    $html .= '<div class="panel-body">' . $arc['comment'] . '</div>';-->
<!--                    $html .= '<div class="panel-footer" align="right">';-->
<!--                    $html .= '<a href="#" class="btn btn-default edit" id="">Edit</a>';-->
<!--                    $html .= '<a href="#" class="btn btn-default Reply" id="">Reply</a>';-->
<!--                    $html .= '</div>';-->
<!--                    $html .= '</div>';-->
<!--                }-->
<!--                    if (!is_null($arc['child'])){-->
<!---->
<!--                        $child_ids = explode(",", $arc['child']);-->
<!--                        //var_dump($child_ids);-->
<!--                        // отфильтровываем комментарие по childs_id из массива общего-->
<!---->
<!--                        $childs = filter($arr, $child_ids);-->
<!--                        // открываем div childs-->
<!---->
<!--                        $html .= '<div class="childs" style="margin-left: 50px; ">';-->
<!--                        //global $test333;-->
<!---->
<!--                        //if ($test333 != $childs) {-->
<!--                        $html .= print_com($childs);-->
<!--                        //}-->
<!--                        $html .= '</div>';-->
<!---->
<!--                    }-->
<!---->
<!---->
<!---->
<!---->
<!--                }-->
<!--                return $html;-->
<!--            }-->
<!---->
<!---->
<!--         ?>-->
<!--        <div class="row">-->
<!--<div class="col-md-12">-->
<?php
//
//print(print_com($comments)); ?>
<!--    </div>-->
<!--</div>-->
<!--    </div>-->

















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <div class="cont">-->
<!--                <div class="img_cl"><img src="--><?php //echo $rows['post_image'] ?><!--" style="width: 100%;" alt=""></div>-->
<!--                <h3 class="title_cl" style="text-align: center;">--><?php //echo $rows['title']; ?><!--</h3>-->
<!--                <p style="margin-bottom: 50px;">--><?php //echo $rows['post_content']; ?><!--</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-12">-->
<!--            <div class="panel panel-info main">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="panel-title">By --><?php // ?><!--</div>-->
<!--                </div>-->
<!--                <div class="pull-right"></div>-->
<!--                <div class="panel-body"></div>-->
<!--                <!--                    @if(Auth::user())-->
<!--                <div class="panel-footer" align="right">-->
<!--                    <!--                        @if(Auth::user()->id==$comment->user->id)-->
<!--                    <a href="#" class="btn btn-default edit" id="">Edit</a>-->
<!--                    <!--                        @endif-->
<!--                    <a href="#" class="btn btn-default Reply" id="">Reply</a>-->
<!--                </div>-->
<!--                <!--                    @endif-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->














<!--                $html .= '<div class="panel panel-info main">';-->
<!---->
<!--                $html .= '<div class="panel-heading">';-->
<!--                    $html .= '<div class="panel-title">By </div>';-->
<!--                    $html .= '</div>';-->
<!--                $html .= '<div class="pull-right"></div>';-->
<!--                $html .= '<div class="panel-body">'. $arc->comment .'</div>';-->
<!--                $html .= '<div class="panel-footer" align="right">';-->
<!--                    $html .= '<a href="#" class="btn btn-default edit" id="">Edit</a>';-->
<!--                    $html .= '<a href="#" class="btn btn-default Reply" id="">Reply</a>';-->
<!--                    $html .= '</div>';-->
<!--                $html .= '</div>';-->
<!---->
<!--                if(!empty($arc->child) && !is_null($arc->child)) {-->
<!---->
<!--                $childs = filter($arr, $arc->child);-->
<!--                $html .= '<div class="childs" style="margin-left: 20px; ">';-->
<!--                $html .= print_com($childs);-->
<!--                $html .= '</div>';-->
<!--                }-->
<!--                }-->
<!--                return $html;-->
<!--            }-->
<!---->
<!--            ?>-->