<?php

class Shows {
    public function allShows(){
        $sql = 'SELECT `title`,`performer`, `date`, `startTime` FROM `shows`';
        $res = SingletonPDO::getInstance()->query($sql);
        return $res;
    }

    public function allShowsTypes ()
    {
        $sql = 'SELECT `type` FROM `showtypes`';
        $res = SingletonPDO::getInstance()->query($sql);
        return $res;
    }

    public function newShowType($type)
    {
        $res= NULL;
        $matches = [];

        if (!empty($type)) {
            $type =  html_entity_decode($type);
            $sql = 'INSERT INTO `showtypes`(`type`) VALUES (:type)';
            $query = SingletonPDO::getInstance()->prepare($sql);
            $query->bindValue(':type', $type, PDO::PARAM_STR);
            $res = $query->execute();
            echo 'la nouvelle catégorie de show "' . $type . '" a été créée avec succès';

        } else {
            echo 'la catégorie ' . $type . ' ne peut pas être enregistrée.';
        }
        return $res;
    }

   
}