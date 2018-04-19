<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once 'modal_window.html';
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
                <li><a href="#" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Posts</a></li>
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
                    <div class="img_cl"><img src="http://test.loc/<?php echo $q->post_image ?>" style="width: 100%;" alt=""></div>
                    <h3 class="title_cl" style="text-align: center;"><?php echo $q->title; ?></h3>
                    <p style="margin-bottom: 50px;"><?php echo $q->post_content; ?></p>
                </div>
            </div>
        </div>
            <?php
endforeach;
?>





<div class="row">
    <div class="col-md-12">
        <form action="<?php echo $query[0]->id;?>/message" method="POST">
            <div class="form-group">
                <textarea name="comment" id="comment" rows="6" class="form-control" class="comment"></textarea>
            </div>
            <?php
            foreach ($query as $q):
            ?>
            <input type="hidden" name="post_id" value="<?php echo $q->id;?>">
            <?php endforeach; ?>
            <input type="hidden" name="user_id" value="<?php echo $this->session->id;?>">
            <input type="hidden" name="name" value="<?php echo $this->session->name; ?>">
            <?php
            ?>
            <button type="submit" class="btn btn-primary" id="send_mess" style="" name="send_mess">Send</button>
        </form>
        <br>
    </div>

    <div class="col-md-12">
      <div class="comment_user" id="comment_user">

      </div>  
    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

    // var edit = document.getElementsByClassName('edit');

    // for(var i=0; i<edit.length; i++) {
    //     edit[i].addEventListener('click', function(e) {




    //         e.preventDefault();
    //    console.log(e.target.attr('data-id'));
    //     });

    // }






//var comment_user = document.getElementsByClassName('comment_user')[0];
var comment_user = document.getElementById('comment_user');
var arr = <?php echo json_encode($com); ?>;


 
for(var i=0; i<arr.length; i++) {
        
    if(arr[i].parent_id*1 === 0) {

        var wrapper = create_wrapper();
        var message = wrapper.getElementsByClassName('panel-body')[0];
            
        message.innerText = arr[i].comment;
        message.id = arr[i].id;
        comment_user.appendChild(wrapper);
    }
}

for (var j=0; j<arr.length; j++) {
    if (arr[j].parent_id*1 !== 0) {
       addMessage(arr[j].parent_id, arr[j].id, arr[j].comment);

    }

}

function create_wrapper() {
    var wrapper = document.createElement('div');
    var panel_info = document.createElement('div');
    var panel_heading = document.createElement('div');
    var panel_title = document.createElement('div');
    var pull_right = document.createElement('div');
    var panel_body = document.createElement('div');
    var panel_footer = document.createElement('div');
    var edit = document.createElement('a');
       
    wrapper.id = 'wrapper'; 
    wrapper.className = 'wrapper';
    panel_info.className = 'panel panel-info main';
    panel_heading.className = 'panel-heading';
    panel_title.className = 'panel-title';
    pull_right.className = 'pull-right';
    panel_body.className = 'panel-body';
    panel_footer.className = 'panel-footer';
    edit.className = 'btn btn-default edit';

    wrapper.appendChild(panel_info);
    panel_info.appendChild(panel_heading);
    panel_heading.appendChild(panel_title);
    panel_info.appendChild(pull_right);
    panel_info.appendChild(panel_body);
    panel_info.appendChild(panel_footer);
    panel_footer.appendChild(edit);
    //edit.href = "#";
    edit.innerText = 'Reply';

    return wrapper;
}



function addMessage(parent_id, id, comment) {
 
var parent = document.getElementById(parent_id);

var wrapper = create_wrapper();
var message = wrapper.getElementsByClassName('panel-body')[0];
message.innerText = comment;
message.id = id;
var edit = wrapper.getElementsByClassName('edit')[0];
edit.innerText = 'Reply';
edit.setAttribute('data-id', id);
//parent.nextSibling.childNode.setAttribute('data-id', id);
var parent = parent.parentElement.parentElement;

wrapper.setAttribute('data-id', id);

    if(parent.hasAttribute('data-id')){
        comment_user.insertBefore(wrapper, parent.nextSibling).style.marginLeft = '100px';
    }
    else {
        comment_user.insertBefore(wrapper, parent.nextSibling).style.marginLeft = '50px';
     }
 }

</script>


</body>
</html>



















