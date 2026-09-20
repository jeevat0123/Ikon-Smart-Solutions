<?php
$validations = [
    "name"=>[
        "length"=>50,
        "pattern"=>"^[a-zA-Z' ]+$"
    ],
    "mobile"=>[
        "length"=>10,
        "pattern"=>"^\d{10}$"
    ],
    "email"=>[
        "length"=>50,
        "pattern"=>"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
    ],
    "interstedin"=>[
        "length"=>150,
        "pattern"=>"^[a-zA-Z0-9, .]*$"
    ]    
];

$mail = [
    "fromEmail"=>["mailenquiry@logoforbusiness.co.in","Ikon Smart Solutions Enquiry"],
    "toEmail"=>['ikonsmartsolutions@gmail.com ','Ikon Smart Solutions'],
    "companyName"=> "Ikon Smart Solutions",
    "mobile" =>8778627795 
];