<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        if($this->session->autenticado) {
            $this->load->view("cabecalho_view",
                array("titulo" => "Painel - Sistema de Estoque")
            );
            $this->load->view("painel_barra_navegacao_view");
            $this->load->view("painel_inicial_view");
            $this->load->view("rodape_view");
        } else {
            redirect(base_url());
        }
    }

    public function produto() {
        echo uri_string();
        $url = explode("/", uri_string());

        switch (count($url)) {
            case 0:
            $titulo = "Listar Produtos";
            break;
            default:
            $titulo = "Não é listar";
            break;
        }

        $this->load->view("cabecalho_view",
            array("titulo" => "Painel - ${titulo} - Sistema de Estoque")
        );

        $this->load->model("produto_model");
        $produtos = $this->produto_model->listar();

        $this->load->view("painel_barra_navegacao_view");

        if(count($url) == 2) {
            $this->load->view("painel_produtos_listar_view", 
                array("produtos" => $produtos));
        } else {
            if($url[2] === "excluir"){
              echo "<br><h1>Produto deletado com sucesso!</h1><br>";

              $this->db->delete('produtos', array('idProduto' => $url[3]));
          }else{

            $model = new Produto_model();
            $model->idProduto = $url[3];
            $model->nome = $url[4];
            $model->preco = $url[5];
            $model->quantidade =  $url[6];

            var_dump($model->idProduto);


            
            $this->db->update('produtos', $model, array('idProduto' => $model->idProduto));

            echo "<br><h1>Produto alteradi com sucesso!</h1><br>";
        }




    }

    $this->load->view("rodape_view");
}

}
