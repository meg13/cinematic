Array.from(document.querySelectorAll(".notification-list a")).forEach(notification => {
    notification.onclick = () => {
        const notifID = notification.parentElement.id;
        ajaxGet("api/notification_read.php?id=" + notifID);
    }
})