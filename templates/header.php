<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My test news blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/css/mycss.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/bootstrap/js/jquery-1.7.2.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/bootbox.min.js"></script>
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">My test news blog</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li ><a href="/">Home</a></li>
                    <li><a href="/admin/">Admin</a></li>
                    <?php if(!empty($_SESSION['is_admin'])): ?>
                        <li><a href="/admin/logout/">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    

