<?php

function output_head($page_title, $page_description) {
    echo <<<HEAD
    <meta charset="utf-8">
    <title>$page_title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$page_description">
    <meta name="author" content="Beshoy Bebawe">
    <!-- font Awesome icons CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <!-- Bootstrap - CSS -->
    <link rel="stylesheet" href="css/bootstrap-4.2.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- JQuery scripts - styles -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- Html5 shim for legacy browsers support, hosted by google -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
HEAD;
}
?>