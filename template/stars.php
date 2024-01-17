<?php
$filled_amount = $_GET["stars_filled_amount"] ?? 0;

// For accessibility:
// document = informational, not interactive
// application = user input, interactive
// https://stackoverflow.com/a/49199809
$svg_role = $_GET["stars_role"] ?? "document";

const STARS_AMOUNT = 5;
?>

<div class="stars stars-<?php echo $filled_amount ?>">
    <?php for ($i = 0; $i < STARS_AMOUNT; $i++): ?>
        <svg role="<?php echo $svg_role ?>">
            <title>Stella <?php echo $i + 1 ?></title>
        </svg>
    <?php endfor ?>
</div>