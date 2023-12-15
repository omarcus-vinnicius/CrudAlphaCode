<?php

namespace App\Model;

class CrudBD extends Connection
{

    public function __construct()
    {
        parent::__construct();

    }

    public function GetAllUsers()
    {
        $users = $this->pdo
            ->query("SELECT IdUser, Nome, Email, Profissao, date_format(DataDeNascimento,'%d/%m/%Y') as DataDeNascimento, 
            TelefoneContato, CelularContato, 
             NotificacaoEmail, NotificacaoWhatsapp, NotificacaoSMS
            FROM TblUsers;")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($users) === 0)
            return false;

        return $users;

    }

    public function InsertUser($userinsert, $dataDeNascimento)
    {
        $user = $this->pdo
            ->prepare(" INSERT INTO TblUsers(
            Nome,
            Email,
            DataDeNascimento ,
            Profissao ,
            TelefoneContato ,
            CelularContato  ,
            NotificacaoEmail ,
            NotificacaoWhatsapp  ,
            NotificacaoSMS  ) 

            values 

            (:Nome,
             :Email,
             :DataDeNascimento,
             :Profissao,
             :TelefoneContato,
             :CelularContato,
             :NotificacaoEmail,
             :NotificacaoWhatsapp,
             :NotificacaoSMS);");

        $user->execute([
            'Nome' => $userinsert['Nome'],
            'Email' => $userinsert['Email'],
            'DataDeNascimento' => $dataDeNascimento,
            'Profissao' => $userinsert['Profissao'],
            'TelefoneContato' => $userinsert['TelefoneContato'],
            'CelularContato' => $userinsert['CelularContato'],
            'NotificacaoEmail' => $userinsert['NotificacaoEmail'],
            'NotificacaoWhatsapp' => $userinsert['NotificacaoWhatsapp'],
            'NotificacaoSMS' => $userinsert['NotificacaoSMS'],
        ]);

        $user->fetchAll(\PDO::FETCH_ASSOC);

        return true;

    }

    public function DeleteIdUser($id)
    {
        $user = $this->pdo

            ->prepare("DELETE FROM TblUsers WHERE IdUser = :id ; ");

        $user->execute(['id' => $id]);

        $user->fetchAll(\PDO::FETCH_ASSOC);

        return true;

    }


    public function UptadeIdUsers($id, $userupdate, $dataDeNascimento)
    {
        $user = $this->pdo
            ->prepare("UPDATE TblUsers SET 
            Nome = :Nome,
            Email = :Email,
            DataDeNascimento = :DataDeNascimento,
            Profissao = :Profissao,
            TelefoneContato = :TelefoneContato,
            CelularContato = :CelularContato,
            NotificacaoEmail = :NotificacaoEmail,
            NotificacaoWhatsapp = :NotificacaoWhatsapp,
            NotificacaoSMS = :NotificacaoSMS
            WHERE IdUser = :id ;");

        $user->execute([
            'id' => $id,
            'Nome' => $userupdate['Nome'],
            'Email' => $userupdate['Email'],
            'DataDeNascimento' => $dataDeNascimento,
            'Profissao' => $userupdate['Profissao'],
            'TelefoneContato' => $userupdate['TelefoneContato'],
            'CelularContato' => $userupdate['CelularContato'],
            'NotificacaoEmail' => $userupdate['NotificacaoEmail'],
            'NotificacaoWhatsapp' => $userupdate['NotificacaoWhatsapp'],
            'NotificacaoSMS' => $userupdate['NotificacaoSMS'],
        ]);


        $user->fetchAll(\PDO::FETCH_ASSOC);
        return true;

    }




}

?>