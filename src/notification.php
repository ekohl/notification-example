<?php
function getCustomers() {
    return array('henk@example.com');
}

function getUsage($customer) {
    return 1;
}

function shouldNotifyCustomer($customer, $usage) {
    return $customer == "henk@example.com" && $usage > 0.75;
}

function notifyCustomer($mailer, $customer, $usage) {
    return $mailer->send($customer, "High usage", "Your usage is high: ${usage}");
}

function checkUsageAndNotify($mailer) {
    $customers = getCustomers();

    foreach($customers as $customer) {
        $usage = getUsage($customer);
        if (shouldNotifyCustomer($customer, $usage)) {
            notifyCustomer($mailer, $customer, $usage);
        }
    }
}
