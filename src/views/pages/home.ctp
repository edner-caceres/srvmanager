<?php
	echo $this->Html->script('app.js', array('inline' => false));
        echo $this->Html->css('http://localhost/libs/extjs-4.1.1/examples/ux/css/ItemSelector.css', 'stylesheet', array('inline' => false));
        echo $this->Html->css('chooser.css', 'stylesheet', array('inline' => false));
?>

<div id="main_container">
    <div id="main_content">
        <div id="center_content">
            <div class="left_content">
                <div class="center_text"  style="height: 200px;">
                    <h1 >Bienvenido a SinfoSys</h1>
                    <img  width="128" height="128" src="img/logo_institucion.gif"  class="img_left" alt="logo institucion"/>
                    SinfoSys fue dise&ntilde;ado como un sistema interno de la institucion para la admisnitracion y seguimiento de los servicios ofrecidos y captados.
                </div>
                
                <div class="center_text sistemas" >
                    
                    <h1 style ="color:#1E4E8F;">Sistemas Disponibles para el usuario</h1>
                    <div id="menu-sistemas">
                        <div class="news_tab">
                            <img src="img/error128x128.png" alt="No inicio session" class="img_left" />
                            <h3 style="color: #710000">No inicio session</h3>
                            <hr />
                            <p style="font-size: 14px;">Disculpe <b>No ha iniciado session</b>, para tener acceso al menu debe iniciar session primero.<br /><br />
                                Para iniciar session haga click en el boton <b>Iniciar session</b> que se encuentra en la esquina superior derecha e ingrese sus credenciales.</p>
                        </div>
                    </div>

                </div>
            </div> <!-- end of left_content -->
            <div class="right_content">
                <div class="center_text">
                    <h1>Avisos</h1>
                    <ol class="commentlist">
                        <li class="alt" id="comment-63">
                            <cite>
                                <img alt="" src="img/social_rss.png" class="avatar" height="40" width="40"/>Erwin Says: <br />
                                <span class="comment-data">Comments are great!</span>
                            </cite>
                        </li>
                        <li id="comment-67">
                            <cite>
                                <img alt="" src="img/social_rss.png" class="avatar" height="40" width="40"/>admin Says: <br />
                                <span class="comment-data">ALorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero.Suspendisse bibendum.
                                </span></cite>

                        </li>
                    </ol>
                    <h1>Ultimas noticias</h1>
                    <ol class="commentlist">
                        <li class="alt" id="comment-63">
                            <cite>
                                <img alt="" src="img/calendar_news.png" class="avatar" height="40" width="40"/>Erwin Says: <br />
                                <span class="comment-data">Comments are great!</span>
                            </cite>
                        </li>
                        <li id="comment-67">
                            <cite>
                                <img alt="" src="img/calendar_news.png" class="avatar" height="40" width="40"/>admin Says: <br />
                                <span class="comment-data">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero.</span>
                            </cite>
                        </li>
                    </ol>
                </div>
            </div> <!-- end of right_content -->
        </div>
    </div>
    <!-- end of main_content -->
</div>
<!-- end of main_container -->