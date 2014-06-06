<?php

// só define as constantes se elas ainda não forem definidas

if(!defined('URL_BASE')){

    if($_SERVER['SERVER_NAME'] == "localhost"){
        define('URL_BASE', "http://localhost/crentemkt/", true);
        define('DB_SERVER', "localhost", true);
        define('DB_USUARIO', "root", true);
        define('DB_SENHA', '', true);
        define('DB_BASE', "crentemkt", true);
        function db_erro(){
            // ao ter erro mysql vai mostar um debug com a linha de erro do php e o erro sql
            return debug_print_backtrace() . "<br />" . mysql_erro();
        }
    }elseif($_SERVER['SERVER_NAME'] == "crentequefazmarketing.com.br" || $_SERVER['SERVER_NAME'] == "www.crentequefazmarketing.com.br"){
        define('URL_BASE', "http://www.crentequefazmarketing.com.br/", true);
        define('DB_SERVER', "mysql01.hstbr.net", true);
        define('DB_USUARIO', "crentemkt", true);
        define('DB_SENHA', 'omega123', true);
        define('DB_BASE', "crentemkt", true);
        function db_erro(){
            // ao ter erro mysql vai mostar um debug com a linha de erro do php e o erro sql
            return debug_print_backtrace() . "<br />" . mysql_erro();
            return 'O programa contém um erro, favor entrar em contato com o <a href="mailto:leonardo@leoartes.com.br">Webmaster</a>';
        }
    }
    define('FRASE_SECRETA', "uma frase que vai aumentar a segurança de nossas senhas");

}