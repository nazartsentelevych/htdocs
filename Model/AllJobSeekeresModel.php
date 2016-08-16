<?php


namespace Model;

use Library\DbConnection;

class AllJobSeekeresModel
{
    public function showalljobseekers()
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT * FROM job_seekers";

        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);


        $regs = $sth->fetchAll(\PDO::FETCH_ASSOC);


        if (!$regs) {
            throw new NotFoundException('Шукача не знайдено');
        }

        return $regs;
    }
}