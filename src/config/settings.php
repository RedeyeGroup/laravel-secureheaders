<?php
return array(
    'strictTransportSecurity' => array(
        'enabled' => true,
        'maxAge' => '631138519',
        'includeSubdomains' => false,
    ),

    'xContentTypeOptions' => array(
        'enabled' => true,
    ),

    'xFrameOptions' => array(
        'enabled' => true,
        'value' => 'SAMEORIGIN',
    ),

    'xXssProtection' => array(
        'enabled' => true,
        'value' => '1',
        'mode' => '',
    ),

    'xRobotsTag' => array(
        'enabled' => true,
        'value' => 'noodp',
    ),

    'xDownloadOptions' => array(
        'enabled' => true,
    ),
);