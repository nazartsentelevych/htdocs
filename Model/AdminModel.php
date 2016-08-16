<?php
namespace Model;

use Library\DbConnection;
use Library\NotFoundException;

class AdminModel
{
//    public function usercreate()
//    {
//        $db = DbConnection::getInstance()->getPdo();
//        
//        $sql = "
////            select b.title, b.id, b.price, b.status, group_concat(a.name) as authors
////            from book b join  book_author ba on b.id = ba.book_id
////            join author a on ba.author_id = a.id
////            group by b.id
////
////        ";
//        $sth = $db->query($sql);
//        $users = $sth->fetchAll(\PDO::FETCH_ASSOC);
//        
//        
//        $usercreate = array(
//            'region' => 'КИЇВСЬКИЙ',
//            'dateStart' => '17:39:16:07:2016',
//            'name' => 'Прізвще Імя По-батькові' ,
//            'contact' => 'м.Київ, пр-т.Перемоги,35'
//        );
//        return $usercreate;
//    }
    

    public function showuser()
    {
        $db = DbConnection::getInstance()->getPdo();
//        $sql = "
//            select b.title, b.id, b.price, b.status, group_concat(a.name) as authors
//            from book b join  book_author ba on b.id = ba.book_id
//            join author a on ba.author_id = a.id
//            group by b.id
//
//        ";   - запит, показати всіх користувачів

        $sth = $db->query($sql);
        $users = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (!$users) {
            throw new NotFoundException('Books not found');
        }

        return $users;
    }






    public function userMe()
    {

        $db = DbConnection::getInstance()->getPdo();
        $identif = $_SESSION['id'];
        $sql = "SELECT * FROM wuser LEFT JOIN region ON wuser.id_region = region.id WHERE wuser.id='$identif'";
        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $sth = $db->query("SET NAMES 'utf8'");
        $sth = $db->query($sql);

        $user = $sth->fetchAll(\PDO::FETCH_ASSOC);


//            );
        return $user;
    }


}