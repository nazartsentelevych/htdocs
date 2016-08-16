<?php


namespace Model;

use Library\Request;
use Library\DbConnection;

class CompanyCreateModel
{
    public $vud;
    public $id_region;
    public $company;
    public $PIB;
    public $contact;
    public $telefon;
    public $email;
    
    /**
     * UserCreate constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->vud = $request->post('vud');
        $this->id_region = $request->post('id_region');
        $this->company = $request->post('company');
        $this->PIB = $request->post('PIB');
        $this->contact = $request->post('contact');
        $this->telefon = $request->post('telefon');
        $this->email = $request->post('email');
        
        
    }

    /**
     * @return bool
     */
    function isValid()
    {
        $res = ($this->vud !== '' &&
            $this->id_region !== '' &&
            $this->company !== '' &&
            $this->PIB !== '' &&
            $this->telefon !== '' &&
            $this->email !== '' &&
            $this->contact !== '' );


//        $res = $this->username !== '' && $this->email !== '' && $this->message !== '';
        return $res;
    }

    public function save(array $comp)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sql = 'INSERT INTO company (vud, id_region, company, PIB, contact, telefon, email)
                VALUES (:vud, :id_region, :company, :PIB, :contact, :telefon, :email)';
        $s = $db->prepare($sql);
        $s->execute($comp);
    }

    public function showreg()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sql = "SELECT * FROM region";
        // $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price DESC ');
        $sth = $db->query("SET NAMES 'utf8'");
        $sth = $db->query($sql);


        $regs = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (!$regs) {
            throw new NotFoundException('Books not found');
        }

        return $regs;
    }

    public function showcompany($company)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sql = "SELECT * FROM company WHERE id = '$company'";
        $sth = $db->query("SET NAMES 'utf8'");
        $sth = $db->query($sql);
        $company = $sth->fetchAll(\PDO::FETCH_ASSOC);
        if (!$company) {
            $company = null;
        }
        return $company;
    }

    public function updatecompany(array $company)
    {
        $db = DbConnection::getInstance()->getPdo();

        $sth = $db->query("SET NAMES 'utf8'");

        $sql = "UPDATE company SET
                company = :company,
                PIB = :PIB,
                contact = :contact,
                telefon = :telefon,
                email = :email
                
                WHERE id = :id";

        $s = $db->prepare($sql);

        $s->execute($company);

    }

}