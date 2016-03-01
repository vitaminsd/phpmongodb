<?php defined('PMDDA') or die('Restricted access'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>i-Manager</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="i-Manager">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="<?php echo Theme::getPath(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Theme::getPath(); ?>css/style.css">
        <script src="<?php echo Theme::getPath(); ?>js/jquery-1.11.2.min.js" type="text/javascript"></script>
    </head>

    <body>
        <div id="container">
        <header class="main-header" id="header">
            <!-- Logo -->
            <nav class="navbar navbar-default navbar-nomargin" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" 
                    data-target="#example-navbar-collapse">
                        <span class="sr-only">Navigator</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Theme::getHome(); ?>">i-Manager</a>
                </div>
                <div class="collapse navbar-collapse" id="example-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo Theme::URL('Server/Execute'); ?>" ><?php echo I18n::t('Execute');?></a></li>
                        <li><a href="<?php echo Theme::URL('Database/Index'); ?>" ><?php echo I18n::t('DB');?></a></li>
                        <li><a href="<?php echo Theme::URL('Configuration/ListPaths'); ?>" ><?php echo I18n::t('C_F');?></a></li>
                        <li><a href="<?php echo Theme::URL('Login/Logout'); ?>"  ><?php echo I18n::t('LOGOUT');?></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="center">