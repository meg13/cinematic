<?php

require_once("api/notification_text.php");

$notifications = $template["notifications"];
if (!isset($notifications)) {
    die("Notifications not set");
}

?>

<section class="col-center-only">
    <header>
        <h1>Notifiche</h1>
    </header>
    <ul class="notification-list">
        <?php foreach ($notifications as $notification): ?>
            <li id="<?php echo $notification["notif_id"] ?>" <?php if ($notification["read"]) echo 'class="read"' ?> >
                <a href="<?php echo get_notification_action($notification) ?>">
                    <?php echo get_notification_text($notification) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</section>