<section class="col-right">
    <h2>Post</h2>
        <article class="post">
        <?php foreach ($templateParams["post"] as $post){
            $_GET["post"] = $post;
            require("post_element.php");
        }?>
        </article>
</section>


