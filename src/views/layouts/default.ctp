<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php
            echo "SAILC - Sistema de Administracion Integrado del Laboratorio de Computo";
            ?>
        </title>
        <?php
            $opciones = array('inline' => true);
            echo $this->Html->css('http://localhost/libs/ext-4.0.2/resources/css/ext-all.css', 'stylesheet', $opciones);
            echo $this->Html->script('http://localhost/libs/ext-4.0.2/ext-debug.js', $opciones);

            echo $this->Html->css('iconos', 'stylesheet', $opciones);
            echo $this->Html->css('fondos', 'stylesheet', $opciones);
            echo $this->Html->css('sca', 'stylesheet', $opciones);

            echo $scripts_for_layout;
        ?>
        </head>
        <body>
            <div id="container">
                <div id="header">
                    <a id="menu" style="float:right;margin: 4px 10px;">
                    </a>

                    <div class="api-title">SinfoSys - Sistema Integrado de Administracion</div>
                    <div id="content">
                    <?php echo $content_for_layout; ?>
                </div>
                <div id="footer">
                    <div style="float:left; padding-top:10px;">
                        LABINFSIS&copy; - Todos los derechos reservados 2010
                    </div>
                    <div style="float:right;padding-left:2px;">
                        <img src="img/extjs.gif" alt="ExtJS" /> | <img src="img/cakephp-logo.gif" alt="CakePHP" /> |<img src="img/postgreSQL.png" alt="PostgreSQL" />
                    </div>
                </div>
            </div>
            <div id="log">
                <?php echo $this->element('sql_dump'); ?>
            </div>
        </div>
    </body>
</html>