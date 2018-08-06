<?php namespace MiniChat;
use MiniChat\SuperPDO;

class MiniChat
{
    private $config;

    // Configuration de la class
    public function __construct() {
        $this->config = include(__DIR__."/../config/app.php");
    }

    // "Getter" permet de retourner la config si les clés ne sont pas null
    public function getConfig($key = null) {
        if(!$key) {
            return $this->config;
        }

        return $this->config[$key];
    }

    /***
     * Retourne tous les messages récents
     * Le nombre d'entrées est limitée par le fichier de config
     *
     * @return array
     */
    public function recentMessages()
    {
        $reponse = $bdd->query('SELECT m.pseudo, m.message,m.date, u.color FROM mini_chat m LEFT JOIN user u ON m.pseudo = u.pseudo ORDER BY ID DESC LIMIT 0, 10');
    }
}    