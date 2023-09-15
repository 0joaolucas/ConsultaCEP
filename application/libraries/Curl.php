<?php

//Implementa o CURL e configura o endereço do webservice
//de consulta o cpf

class Curl{
    //url base para o serviço ViaCEP
    private $endereco_ws = "http://viacep.com.br/ws";
    private $url_ws;

    public function consulta($cep){
        //construindo a url completa para fazer a requisição(de acordo com o site oficial)
        $this->url_ws = $this->endereco_ws . '/' . $cep . '/json/';

        //abre a conexão
        $ch = curl_init();

        //define url
        curl_setopt($ch, CURLOPT_URL, $this->url_ws); //CURLOPT indica que voce está configurando a url da requisição
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // CURLOPT_RETURNTRANSFER indica que voce está configurando a
                                                        //opção de retorno da transferência. true define que voce deseja o resultado em string
        
        //executa o post
        $resultado = curl_exec($ch);

        //verificando erros na conexão
        if (curl_error($ch)){
            echo 'Erro: ' . curl_error($ch); //curl_error é uma função usada para obter informações sobre qualquer erro que tenha ocorrido durante a conexão
            return false;
        }
        return $resultado;

        //fecha a conexão
        curl_close($ch);
    }
}