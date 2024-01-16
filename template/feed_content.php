<section class="col-left">
            <header>
                <h1>Attività di chi segui</h1>
            </header>
            <h2>Visti di recente</h2>
        </section>
<section class="col-right">
    <h2>Post</h2>
    <?php foreach ($template["post"] as $post){
        $_GET["post"] = $post;
        require("post_element.php");
    }?>
</section>


