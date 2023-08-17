<?php 
session_start();
requireValidSession();
loadTemplateView('lista_chamados', ['chamados' => 'teste']);