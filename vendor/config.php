

<?php
require_once('vendor/autoload.php');

$stripe = array(
    "secret_key"      => "sk_test_mEG9xJjT7BnHFU4R79jR1xjE ",
    "publishable_key" => "pk_test_09rtbrk8kUQ19LcgiW0zm3tE"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>

