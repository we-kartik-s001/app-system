<?php

return [
    "name"=> "Appointment",
    "title"=> "Appointment System",
    "slug"=> "appointment",
    "thumbnail"=> "https://img.site/p/300/160",
    "is_dev" => env('MODULE_APPOINTMENT_ENV')?true:false,
    "excerpt"=> "Appointment System",
    "description"=> "Appointment System",
    "download_link"=> "",
    "author_name"=> "Kartik",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> false,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_appointment_",
    "providers"=> [
        "\\VaahCms\\Modules\\Appointment\\Providers\\AppointmentServiceProvider"
    ],
    "aside-menu-order"=> null
];
