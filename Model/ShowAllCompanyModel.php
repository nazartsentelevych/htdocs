<?php


namespace Model;

use Library\DbConnection;

class ShowAllCompanyModel
{
    public function showallcompany($vud)
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT * FROM company WHERE vud ='$vud'";

        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);


        $regs = $sth->fetchAll(\PDO::FETCH_ASSOC);


        if (!$regs) {
            $regs = null;
//            throw new NotFoundException('Шукача не знайдено');
        }

        return $regs;
    }

}