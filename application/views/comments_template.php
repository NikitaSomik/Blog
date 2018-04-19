
<li>
    <div class="comment">
        <div class="author">
            <?php ?>
            <span class="date"><?php echo $comment['comment'] ;?></span>
        </div>

        <div class="comment_text"><?php  ?></div>
    </div>
     
    <?php if(!empty($comment['childs'])):?>
    <ul>
        <?php echo getCommentsTemplate($comment['childs']);?>
    </ul>  
    <?php endif;?>
</li>

