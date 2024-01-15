<section class="col-right">
    <h2>Post</h2>
        <article class="post">
        <?php foreach ($templateParams["post"] as $post): ?>
            <header>
                <h3><?php echo $post["movie_title"]; ?></h3>
                <div class="stars stars-4"><svg></svg><svg></svg><svg></svg><svg></svg><svg></svg></div>            
            </header>
            <p><?php echo $post["body"]; ?></p>
            <footer>
                <ul>
                    <li class="unliked">
                        <svg></svg>
                        <span><?php echo $templateParams["likes"][$post["post_id"]] ?? 0; ?></span>
                    </li>
                    <li class="comment-button">
                        <svg></svg>
                        <span><?php echo $templateParams["comments"][$post["post_id"]] ?? 0; ?></span>
                    </li>
                    <li>
                        <p><?php echo $post["user_id"]; ?></p>
                    </li>
                </ul>
            </footer>
            <?php endforeach ?>
        </article>
</section>
