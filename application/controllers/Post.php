<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	private $url;

	function __construct() {
    	parent::__construct();
        $this->url = "https://jsonplaceholder.typicode.com/";
    }

    public function mensagemDeRetorno($status_http){

		switch ($status_http) {

			case 100: $mensagem = 'Continuar'; break;
	        case 101: $mensagem = 'Protocolos de Troca'; break;
	        case 200: $mensagem = 'Sucesso'; break;
	        case 201: $mensagem = 'Criado'; break;
	        case 202: $mensagem = 'Aceito'; break;
	        case 203: $mensagem = 'Informacao nao autoritativa'; break;
	        case 204: $mensagem = 'Sem conteúdo'; break;
	        case 205: $mensagem = 'Redefinir Conteúdo'; break;
	        case 206: $mensagem = 'Conteúdo parcial'; break;
	        case 300: $mensagem = 'Múltiplas escolhas'; break;
	        case 301: $mensagem = 'Movido permanentemente'; break;
	        case 302: $mensagem = 'movido temporariamente'; break;
	        case 303: $mensagem = 'Ver outro'; break;
	        case 304: $mensagem = 'Nao modificado'; break;
	        case 305: $mensagem = 'Usar Proxy'; break;
	        case 400: $mensagem = 'Pedido incorreto'; break;
	        case 401: $mensagem = 'Nao autorizado'; break;
	        case 402: $mensagem = 'Pagamento Requerido'; break;
	        case 403: $mensagem = 'Proibido'; break;
	        case 404: $mensagem = 'Nao encontrado'; break;
	        case 405: $mensagem = 'Método nao permitido'; break;
	        case 406: $mensagem = 'Nao Aceitavel'; break;
	        case 407: $mensagem = 'Autenticacao de Proxy Requerida'; break;
	        case 408: $mensagem = 'Tempo limite da requisicao'; break;
	        case 409: $mensagem = 'Conflito'; break;
	        case 410: $mensagem = 'Gone'; break;
	        case 411: $mensagem = 'Comprimento necessario'; break;
	        case 412: $mensagem = 'Falha na pré-condicao'; break;
	        case 413: $mensagem = 'Solicitar entidade muito grande'; break;
	        case 414: $mensagem = 'Request-URI Too Large'; break;
	        case 415: $mensagem = 'Tipo de Mídia Nao Suportado'; break;
	        case 500: $mensagem = 'Erro interno do servidor'; break;
	        case 501: $mensagem = 'Nao implementado'; break;
	        case 502: $mensagem = 'Bad Gateway'; break;
	        case 503: $mensagem = 'Servico indisponível'; break;
	        case 504: $mensagem = 'Tempo limite do gateway'; break;
	        case 505: $mensagem = 'Versao HTTP nao suportada'; break;

	        default:
	            $mensagem = 'Unknown http status code "' . htmlentities($status_http) . '"' ;
	        	break;
		}

		return $mensagem;
	}

	public function curl($url,$data=""){

		$ch = curl_init($url);

		if(!empty($data)){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: application/json; charset=utf-8'));
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$retorno = curl_exec($ch);

		$status_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$mensagem = $this->mensagemDeRetorno($status_http);

		$dados = array(
	        'codigo'=>$status_http,
	        'mensagem'=>$mensagem,
	        'dados'=>$retorno
	    );

	    return $dados;

	}

	public function index($id=""){
		
		$url = empty($id) ? $this->url."posts/" : $this->url."posts/".$id;

		$retorno = $this->curl($url);

		print_r($retorno);
	}

	public function newPost($userId,$title,$body){
		
		$dados = array(
	        'userId'=>$userId,
	        'title'=>$title,
	        'body'=>$body
	    );

	    //AQUI DEVE HAVER UM REQUEST
	}

	public function newAuthor($dados){
		
		/*
		O arrray passado por parâmetro deve conter as informações necessárias
		para inserir um novo autor.
		*/

	}

}
