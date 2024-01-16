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

for (likeButton of document.getElementsByClassName("unliked")) {
    likeButton.onclick = () => {
        const postID = likeButton.closest('.post').id;
        console.log(postID);
        toggleLikeAdd(likeButton, postID);
    } 
}