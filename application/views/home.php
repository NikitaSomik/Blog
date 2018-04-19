<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'modal_window.html';
require_once 'modal_window_edit.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Test</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
<!--            <li><a href="#">Page 1</a></li>-->
<!--            <li><a href="#">Page 2</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            //var_dump($results);
            if ($this->session->has_userdata('userAuthorized')){ ?>
<!--                <li><a href=""><span style="font-size: 20px;font-weight: 400; color: white;">--><?php //echo $this->session->name ; ?><!--</span></span></a></li>-->
                <li><a href="#" data-toggle="modal" data-target="#model_post"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Posts</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span style="font-size: 20px;font-weight: 500; color: white;"> <?php echo $this->session->name ; ?> <span class="caret"></span></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php base_url() ;?>"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="logout" method="POST" style="display: none;">
                            </form>
                        </li>
                    </ul>
                </li>
            <?php }
            else { ?>
                <li><a href="register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <?php
        foreach ($posts as $post): ?>
            <div class="col-md-6 post_cl">
                <div class="cont">
                    <?php
                    //echo $post['user_id'];
                    //echo $users[0]['id'];
                    ?>
                    <div class="img_cl" id="<?php echo $post['id'] ?>"><a href="show/<?php echo $post['id'] ?>"><img src="<?php echo $post['post_image']; ?>" style="width: 100%;" alt="<?php echo $post['id'] ?>"></a>
                        <?php

                //foreach ($users as $user) {
                    if ($this->session->has_userdata('userAuthorized') && $post['user_id'] == $this->session->id) { ?>
                        <div id="post_edit">
                            <div class="p_edit" data-edit="<?php echo $post['id'] ?>">Edit</div>
                        </div>
                    <?php }
                //}
                        ?>
                    </div>
                    <h3 class="title_cl" style="text-align: center; color: black;"><?php echo $post['title']; ?></h3>
                    <p style="margin-bottom: 50px; color: black;"><?php echo $post['post_content']; ?></p>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

    $('#postsform').on('click', function(e){
        e.preventDefault();

        var titles = $('#title').val();
        var contents = $('#content').val();

        var formData = new FormData();
        formData.append('content', contents);
        formData.append('title', titles);

        formData.append('file_content', $('#file_content').prop('files')[0]);


        $.ajax({
            url: "form_posts",
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){

                $('.row').append('<div class="col-md-6 post_cl"><div class="cont"><div class="img_cl"><img src="http://localhost/test.loc/assets/uploads/'+res.upload_data.file_name+'" style="width: 100%;" alt=""></div><h3 class="title_cl" style="text-align: center;">'+res.title+'</h3><p style="margin-bottom: 50px;">'+res.content+'</p></div></div>');

            },
            error: function(err){
                console.log('error: '+err);
            }
        });

    });









 $('.p_edit').on('click', function(e){
     e.preventDefault();

     $(this).attr("data-toggle","modal");
     $(this).attr("data-target","#model_edit_post");

     var data_edit = $(this).attr('data-edit');
     $('.edit_post_id').val(data_edit);
         //edit_post_id
 }) ;


 $('#edit_postsform').on('click', function(e){
     e.preventDefault();

     var titles = $('#edit_title').val();
     var contents = $('#edit_content').val();
     var edit_post_id = $('.edit_post_id').val();

     var formData = new FormData();
     formData.append('edit_content', contents);
     formData.append('edit_title', titles);
     formData.append('edit_post_id', edit_post_id);
     formData.append('edit_file_content', $('#edit_file_content').prop('files')[0]);


     $.ajax({
         url: "update_posts",
         type: "POST",
         dataType: "json",
         data: formData,
         contentType: false,
         cache: false,
         processData: false,
         success: function(res){

        var current_div = $('#'+res.edit_post_id);
        if (res.upload_data.file_name){
            current_div.children(':first').children().attr('src', 'http://localhost/test.loc/assets/uploads/'+res.upload_data.file_name);
        }
        current_div.next().text(res.title);
        current_div.next().next().text(res.content);

         },
         error: function(err){
             console.log('error: '+err);
         }
     });

 });




   //var post_cl = document.getElementsByClassName('post_cl');
 //
 // var post = 'show/56';
 //
 // var stage;
 //
 // for(var i=0; i<post_cl.length; i++) {
 //     post_cl[i].addEventListener('click', function(e) {
 //
 //    state = {
 //        page: e.target.getAttribute('alt'),
 //        show: 'show'
 //         };
 //
 //    history.pushState(state, '', state.page);
 //
 //    e.preventDefault();
 //     });
 //     }



 // //console.log(post_cl);
 // for(var i=0; i<post_cl.length; i++) {
 //      post_cl[i].addEventListener('click', function(e) {
 //
 //          //var e_targer = e.target;
 //
 //          //console.log(n.getAttribute('alt'));
 //          var id = e.target.getAttribute('alt');
 //
 //          $.ajax({
 //              url: "show/"+id,
 //              type: "GET",
 //              dataType: "json",
 //              success: function(res){
 //                console.log(res);
 //                  //window.location.href = "http://localhost/test.loc/show/"+res;
 //
 //              },
 //              error: function(err){
 //                  console.log('error: '+err);
 //              }
 //          });
 //
 //
 //
 //     });
 // }











</script>
</body>
</html>