<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="<?php $web_title; ?>" />
    <meta name="description" content="<?= $web_desc; ?>" />
    <title><?= $web_title; ?></title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php if (isset($web_link)) { echo $web_link; } else { echo $web_url; }; ?>"/>
    <meta property="og:title" content="<?=$web_title; ?>"/>
    <meta property="og:description" content="<?=$web_desc; ?>"/>
    <meta property="og:image" content="https://cdn.statically.io/img/horrorstory.site/w=720/assets/img/banner.jpg"/>
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image"/>
    <meta property="twitter:url" content="<?php if (isset($web_link)) { echo $web_link; } else { echo $web_url; }; ?>"/>
    <meta property="twitter:title" content="<?=$web_title; ?>" />
    <meta property="twitter:description" content="<?=$web_desc; ?>"/>
    <meta property="twitter:image" content="https://cdn.statically.io/img/horrorstory.site/w=720/assets/img/banner.jpg"/>

    <link rel="apple-touch-icon" sizes="180x180" href="<?=$web_url; ?>assets/img/favicon/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$web_url; ?>assets/img/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$web_url; ?>assets/img/favicon/favicon-16x16.png"/>
    <link rel="manifest" href="<?=$web_url; ?>assets/img/favicon/site.webmanifest"/>

    <link rel="stylesheet" href="<?= $web_url; ?>assets/css/horrorstory.min.css" media="all" />
    <link rel="canonical" href="<?php if (isset($web_link)) { echo $web_link; } else { echo $web_url; }; ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://resources-gules.vercel.app/cdn/v1/secret/js/pro.fa.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <style>
        span.uploaded{
            font-size: .8rm;
            padding: .25rem .5rem;
            background-color: #10B981;
            border-radius: .5rem;
            color: #fafaff;
        }
    </style>