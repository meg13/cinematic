const likeButtons = document.getElementsByClassName("unliked");

//Like yes/no

function toggleLikeAdd(likeButton, post_id) {
    toggleClass(likeButton, "liked", 
        () => {
            likeButton.getElementsByTagName("span")[0].innerText++;
            ajaxGet("api/like.php?post_id="+post_id);
        },
        () => {
            ajaxGet("api/unlike.php?post_id="+post_id);
            likeButton.getElementsByTagName("span")[0].innerText--;
        }
    );
}

Array.from(likeButtons).forEach(likeButton => {
    likeButton.onclick = () => {
        const postID = likeButton.closest('.post').id;
        toggleLikeAdd(likeButton, postID);
    }  
});

//Comment yes/no

function toggleCommentShow(commentButton, commentSection) {
    toggleClass(commentButton, "show_comments", 
        () => commentSection.style.display = "",
        () => commentSection.style.display = "none",
    );
}

Array.from(document.getElementsByClassName("comment-button")).forEach(commentButton => {
    commentButton.onclick = () => {
        const commentSection = commentButton.closest('.post').getElementsByClassName("comment-section")[0];
        toggleCommentShow(commentButton, commentSection);
    } 
});