<?php 
namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Pedido
{
    private \mysqli $mysql;
    
    public function __construct() {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function finalizarPedido(int $tipoIngresso, int $formaPagamento, int $salaSessao, int $poltrona, int $idUsuario) 
    {
        $this->mysql->query("SET foreign_key_checks = 0");
        $id_ingr = $this->insereIngresso($formaPagamento, $tipoIngresso);
        $id_polt_sess = $this->inserePoltronaSessao($salaSessao, $poltrona);
        $this->insereUsuarioDoPedido($idUsuario,$id_ingr);
        $this->inserePoltronaVendidas($id_ingr, $id_polt_sess);
        $_SESSION['Pedido-Sucesso'] = true;
        header("Location: success");
        exit();
    }

    private function insereIngresso(int $formaPagamento, int $tipoIngresso): int
    {
        $resultado = $this->mysql->prepare(
            "INSERT INTO ingressos (id_form_paga_fk, id_tipo_ingr_fk)
            VALUES (?, ?)"
        );
        $resultado->bind_param("ii", $formaPagamento, $tipoIngresso );
        $resultado->execute();
        return $this->mysql->insert_id;
    }

    private function inserePoltronaSessao(int $salaSessao, int $poltrona): int
    {
        $resultado = $this->mysql->prepare(
            "INSERT INTO poltronas_sessoes (id_sala_sess_fk, id_sala_polt_fk)
            VALUES (?, ?)"
        );
        $resultado->bind_param("ii", $salaSessao, $poltrona);
        $resultado->execute();
        return $this->mysql->insert_id;
    }

    private function inserePoltronaVendidas (int $idIngresso, int $idPoltronaSessao)
    {
        $resultado = $this->mysql->prepare(
            "INSERT INTO poltronas_vendidas (id_ingr_fk, id_polt_sess_fk)
            VALUES (?, ?)"
        );
        $resultado->bind_param("ii", $idIngresso, $idPoltronaSessao);
        $resultado->execute();
        
    }
    private function insereUsuarioDoPedido (int $idUsuario, int $idIngresso)
    {
        $resultado = $this->mysql->prepare(
            "INSERT INTO clientes_ingressos (id_clie_fk, id_ingr_fk)
            VALUES (?, ?)"
        );
        $resultado->bind_param("ii",$idUsuario, $idIngresso);
        $resultado->execute();
        
    }

}