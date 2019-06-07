<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller {

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

		$this->load->view('cabecalho_view', 
			array("titulo" => "Autenticação - Sistema de Estoque")
		);
		$this->load->view('autenticacao_view');
		$this->load->view('rodape_view');
        
    }
    
    public function verificar() {

        //$this->load->database(); //está no autoload agora

		$this->load->model('usuario_model');
		
		if(!(isset($_POST['usuario']) && isset($_POST['senha']))){
			redirect(base_url());
		}

		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
        $existe = $this->usuario_model->usuario_existe($usuario, $senha);

        if($existe) {
			// usuario autenticado, registrando a sessão e redirecionando para o painel
			$dados_sessao = array(
					'usuario'  => $usuario,
					'autenticado' => TRUE
			);
			
			$this->session->set_userdata($dados_sessao);

			redirect(site_url('painel'));
        } else {
			// usuario e/ou senha incorreto, vai para tela de login
            redirect(base_url());
        }
    }
}
