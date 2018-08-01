<?php

        // Connexion à la base de données
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=tp_chat;charset=utf8','root','');
            }       

        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
            }