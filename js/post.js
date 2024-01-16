const likeButtons = document.getElementsByClassName("unliked");

//Like yes/no

function toggleLikeAdd(likeButton, post_id) {
    toggleClass(likeButton, "like", 
        () => ajaxGet("api/like.php?post_id="+post_id),
        () => ajaxGet(),
    );
}

for (likeButton of document.getElementsByClassName("unliked")) {
    likeButton.onclick = () => {
        const postID = child.closest('.post').id;
        toggleLikeAdd(likeButton, postID);
    } 
}