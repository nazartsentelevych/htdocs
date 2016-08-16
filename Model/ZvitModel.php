<?php


namespace Model;

use Library\DbConnection;

class ZvitModel
{
    public function zvernenman()
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT COUNT(*) FROM job_seekers WHERE stat = 'male'";



        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);

        $zvernenman = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $zvernenman = $zvernenman[0]['COUNT(*)'];


//        echo '<pre>';
//        echo($regs);
//        echo '</pre>';
//        die;

        if (!$zvernenman) {
            $zvernen = '0';
//           
        }

        return $zvernenman;
    }

    public function zvernenwoman()
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT COUNT(*) FROM job_seekers WHERE stat = 'female'";



        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);

        $zvernenwoman = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $zvernenwoman = $zvernenwoman[0]['COUNT(*)'];


//        echo '<pre>';
//        echo($regs);
//        echo '</pre>';
//        die;

        if (!$zvernenwoman) {
            $zvernenwoman = '0';
//
        }

        return $zvernenwoman;
    }

    public function grupinval()
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT grup, COUNT(*) FROM job_seekers GROUP BY grup";


        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);

        $grupinval = $sth->fetchAll(\PDO::FETCH_ASSOC);
//        $grupinval = $grupinval[0]['COUNT(*)'];


//        echo '<pre>';
//        var_dump($grupinval);
//        echo '</pre>';
//        die;

//        if (!$grupinval) {
//            $zvernenwoman = '0';
////
//        }

        return $grupinval;
    }



    public function rezultat()
    {
        $db = DbConnection::getInstance()->getPdo();

        $sql = "SELECT vuddialnosti, COUNT(*) FROM more_made GROUP BY vuddialnosti";


        $norm = $db->query("SET NAMES 'utf8'");

        $sth = $db->query($sql);

        $rezultat = $sth->fetchAll(\PDO::FETCH_ASSOC);
//        $rezultat = $rezultat[2]['COUNT(*)'];
        foreach($rezultat as $rezul){
            if ($rezul['vuddialnosti']=='Дзвінок'){$dzvinock=$rezul['COUNT(*)'];};
            if ($rezul['vuddialnosti']=='Зустріч з роботодавцем'){$dzvinock=$rezul['COUNT(*)'];};
            if ($rezul['vuddialnosti']=='Дзвінок'){$dzvinock=$rezul['COUNT(*)'];};
            if ($rezul['vuddialnosti']=='Дзвінок'){$dzvinock=$rezul['COUNT(*)'];};



        }
        var_dump($dzvinock);
        echo '<hr>';
        echo '<pre>';
        var_dump($rezultat);
        echo '</pre>';
        die;

//        if (!$grupinval) {
//            $zvernenwoman = '0';
////
//        }

        return $rezultat;
    }

    
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