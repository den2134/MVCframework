<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 05.02.2016
 * Time: 12:41
 */

class Page extends Model{

    public function getList($only_published = false){
        $sql = "SELECT * FROM pages WHERE 1";

        if($only_published){
            $sql .= "and is_published = 1";
        }
        return $this->db->query($sql);
    }

    public function getByAlies($alies){
        $alies = $this->db->escape($alies);
        $sql = "SELECT * FROM pages WHERE alias = '{$alies}' limit 1";
        $result = $this->db->query($sql);

        return isset($result[0]) ? $result[0] : null;
    }
}