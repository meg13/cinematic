<?php

/**
 * Generates the notification text from a notification object.
 */
function get_notification_text($notification) {
    $user = $notification["responsable_user_id"];

    switch ($notification["type"]) {
        case "L":
            return "A <strong>" . $user . "</strong> piace il tuo post";
        case "C":
            return "<strong>" . $user . "</strong> ha commentato il tuo post";
        case "F":
            return "<strong>" . $user . "</strong> ha iniziato a seguirti";
    }
}

/**
 * Generates the notification action from a notification object.
 */
function get_notification_action($notification) {
    switch ($notification["type"]) {
        case "L":
        case "C":
            $url = "profile.php?user=" . $notification["receiving_user_id"];
            if (isset($notification["post_id"])) $url .= "#" . $notification["post_id"];
            return $url;
        case "F":
            return "profile.php?user=" . $notification["responsable_user_id"];
    }
}

?>