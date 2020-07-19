<?php
/** 
*Custom websites in Kenya, , 
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Swiftpay - Best software and web applications solutions in Nairobi, Kenya. Africa. Laravel Apps, API integration, software development.", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Swiftpay prides in piecing together the latest in information technology and thus deliver cutting edge solutions for SMEs within and beyond East Africa. We believe organizations must harness the power leveraged by cloud computing, big data, and the best digital experiences while maintaining operation integrity.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['laravel', 'vue', 'software solutions','android applications', 'MPESA integration', 'WhatsApp chatbots', 'Facebook Chatbots', 'Automated responses', 'ticketing systems', 'Kenya CRM', 'Africa CRM', 'API', 'APIs', 'REST', 'SOAP', 'RESTful', 'Expose APIs', 'Developer in Nairobi Kenya', 'Bespoke software solutions', 'Quality android apps', 'Apps', 'Point of Sales', 'Nairobi', 'POS software', 'Stock visibility', 'Inventory management', 'School systems', 'USSD', 'systems integration', 'Website design', 'Best developers in kenya'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => "index, follow", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => "JCcvDx1KLOSpZlzKshETh_X5z7CwN8DnT9Wcz_XNqAM",
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Swiftpay - Best software and web applications solutions in Nairobi, Kenya. Africa. Laravel Apps, API integration, software development.', // set false to total remove
            'description' => 'Swiftpay prides in piecing together the latest in information technology and thus deliver cutting edge solutions for SMEs within and beyond East Africa. We believe organizations must harness the power leveraged by cloud computing, big data, and the best digital experiences while maintaining operation integrity.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'Swiftpay Africa',
            'images'      => ['https://swiftpayafrica.com/images/logo1.png', 'https://swiftpayafrica.com/images/webapp.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'Swiftpay - Best software and web applications solutions. #GritParagons, #Code, #BusinessSolutions',
            'site'        => '@Evoke254',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Swiftpay - Best software and web applications solutions in Nairobi, Kenya. Africa. Laravel Apps, API integration, software development.', // set false to total remove
            'description' => 'Swiftpay prides in piecing together the latest in information technology and thus deliver cutting edge solutions for SMEs within and beyond East Africa. We believe organizations must harness the power leveraged by cloud computing, big data, and the best digital experiences while maintaining operation integrity.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://swiftpayafrica.com/images/logo1.png', 'https://swiftpayafrica.com/images/webapp.png'],
        ],
    ],
];
