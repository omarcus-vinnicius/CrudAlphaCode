<?php

namespace App\Controller;

use App\Model\CrudBD;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class Crud
{

    public function GetUsers(Request $request, Response $response, array $args): Response
    {

        $usersCrud = new CrudBD();
        $users = $usersCrud->GetAllUsers();

        if ($users) {

            $response = $response->withJson($users);

        } else {

            $response = $response->withJson(['res' => 'Não a usuarios para listar']);

        }


        return $response;

    }


    public function GetUsersID(Request $request, Response $response, array $args): Response
    {
        $id = intval($args['id']);
        $usersCrud = new CrudBD();
        $users = $usersCrud->GetUserID($id);

        if ($users) {

            $response = $response->withJson($users);

        } else {

            $response = $response->withJson(['res' => 'Usuario não encontrado']);

        }


        return $response;

    }

    public function PostUsers(Request $request, Response $response, array $args): Response
    {

        $users = $request->getParsedBody();
        $nome = Trim($request->getParsedBody()['Nome']);
        $email = Trim($request->getParsedBody()['Email']);
        $dataDeNascimento = implode("/", array_reverse(explode("/", Trim($request->getParsedBody()['DataDeNascimento']))));
        $profissao = Trim($request->getParsedBody()['Profissao']);
        $telefoneContato = Trim($request->getParsedBody()['TelefoneContato']);
        $celularContato = Trim($request->getParsedBody()['CelularContato']);
        $notificacaoEmail = strtoupper($request->getParsedBody()['NotificacaoEmail']);
        $notificacaoWhatsapp = strtoupper($request->getParsedBody()['NotificacaoWhatsapp']);
        $notificacaoSMS = strtoupper($request->getParsedBody()['NotificacaoSMS']);

        if ($notificacaoEmail === "TRUE") {
            $notificacaoEmail = 1;

        } else {
            $notificacaoEmail = 0;
        }
        if ($notificacaoWhatsapp === "TRUE") {
            $notificacaoWhatsapp = 1;

        } else {
            $notificacaoWhatsapp = 0;

        }
        if ($notificacaoSMS === "TRUE") {
            $notificacaoSMS = 1;

        } else {
            $notificacaoSMS = 0;
        }


        $usersCrud = new CrudBD();

        if (
            !empty($nome) && !empty($email) && !empty($dataDeNascimento) &&
            !empty($profissao) && !empty($telefoneContato) && !empty($celularContato)
        ) {


            $usersCrud->InsertUser($users, $dataDeNascimento, $notificacaoEmail, $notificacaoWhatsapp, $notificacaoSMS);
            $response = $response->withJson(['res' => 'True', 'msg' => 'Usuario criado com sucesso', $users]);

        } else {
            $response = $response->withJson(['res' => 'False', 'msg' => 'Todos os campos devem ser preenchidos']);

        }


        return $response;

    }


    public function DeleteUsers(Request $request, Response $response, array $args): Response
    {
        $id = intval($args['id']);
        $usersCrud = new CrudBD();
        $users = $usersCrud->DeleteIdUser($id);


        if ($users) {

            $response = $response->withJson(['res' => 'True', 'msg' => 'Usuario deletado com sucesso', $users]);

        } else {

            $response = $response->withJson(['res' => 'False', 'msg' => 'Usuario não pode ser deletado']);

        }


        return $response;

    }


    public function UpdateUsers(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $users = $request->getParsedBody();
        $nome = Trim($request->getParsedBody()['Nome']);
        $email = Trim($request->getParsedBody()['Email']);
        $dataDeNascimento = implode("/", array_reverse(explode("/", Trim($request->getParsedBody()['DataDeNascimento']))));
        $profissao = Trim($request->getParsedBody()['Profissao']);
        $telefoneContato = Trim($request->getParsedBody()['TelefoneContato']);
        $celularContato = Trim($request->getParsedBody()['CelularContato']);
        $notificacaoEmail = strtoupper($request->getParsedBody()['NotificacaoEmail']);
        $notificacaoWhatsapp = strtoupper($request->getParsedBody()['NotificacaoWhatsapp']);
        $notificacaoSMS = strtoupper($request->getParsedBody()['NotificacaoSMS']);

        if ($notificacaoEmail === "TRUE") {
            $notificacaoEmail = 1;

        } else {
            $notificacaoEmail = 0;
        }
        if ($notificacaoWhatsapp === "TRUE") {
            $notificacaoWhatsapp = 1;

        } else {
            $notificacaoWhatsapp = 0;

        }
        if ($notificacaoSMS === "TRUE") {
            $notificacaoSMS = 1;

        } else {
            $notificacaoSMS = 0;
        }

        $usersCrud = new CrudBD();

        if (
            !empty($nome) && !empty($email) && !empty($dataDeNascimento) &&
            !empty($profissao) && !empty($telefoneContato) && !empty($celularContato)
        ) {

            $usersCrud->UptadeIdUsers($id, $users, $dataDeNascimento, $notificacaoEmail, $notificacaoWhatsapp, $notificacaoSMS);
            $response = $response->withJson(['res' => 'True', 'msg' => 'Usuario atualizado com sucesso']);

        } else {

            $response = $response->withJson(['res' => 'False', 'msg' => 'Todos os campos devem ser preenchidos']);
        }


        return $response;

    }


}
?>