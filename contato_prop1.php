<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

 function formataTelefone($numero){
        if(strlen($numero) == 10){
            $novo = substr_replace($numero, '(', 0, 0);
            $novo = substr_replace($novo, '9', 3, 0);
            $novo = substr_replace($novo, ')', 3, 0);
        }else{
            $novo = substr_replace($numero, '(', 0, 0);
            $novo = substr_replace($novo, ')', 3, 0);
        }
        return $novo;
    }


if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
} else {

		    //$usu_email = $_SESSION["usu_email"];
			$usu_id =(isset($_GET["id"])) ? $_GET["id"] : '';
			$sql = "SELECT * FROM dbo.usu_usuario u INNER JOIN dbo.ser_servicos s ON u.usu_id = s.ser_usuid WHERE usu_id='".$usu_id."'";
			$stmt = sqlsrv_query( $conn, $sql );
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
			$usu_nome=trim(utf8_encode($select["usu_nome"]));
			$usu_cnpj= trim(utf8_encode($select["usu_cnpj"]));
			$usu_iestadual=trim(utf8_encode($select["usu_iestadual"]));
			$usu_website=trim(utf8_encode($select["usu_website"]));
			$usu_cep=trim(utf8_encode($select["usu_cep"]));
			$usu_rua=trim(utf8_encode($select["usu_rua"]));
			$usu_numero=trim(utf8_encode($select["usu_numero"]));
			$usu_complemento=trim(utf8_encode($select["usu_complemento"]));
			$usu_bairro=trim(utf8_encode($select["usu_bairro"]));
			$usu_cidade=trim(utf8_encode($select["usu_cidade"]));
			$usu_uf=trim(utf8_encode($select["usu_uf"]));
			$usu_telefone=trim(utf8_encode($select["usu_telefone"]));
			$usu_celular=trim(utf8_encode($select["usu_celular"]));
			$usu_whatsapp=trim(utf8_encode($select["usu_whatsapp"]));
			$usu_email=trim(utf8_encode($select["usu_email"]));
			$usu_tipo=trim(utf8_encode($select["usu_tipo"]));	
			$ser_local=trim(utf8_encode($select["ser_local"]));
			$ser_num=trim(utf8_encode($select["ser_num"]));
			$ser_totpessoa=trim(utf8_encode($select["ser_totpessoa"]));
			$ser_m2=trim(utf8_encode($select["ser_m2"]));
			$ser_banheiro=trim(utf8_encode($select["ser_banheiro"]));
			$ser_cozinha=trim(utf8_encode($select["ser_cozinha"]));
			$ser_palco=trim(utf8_encode($select["ser_palco"]));
			$ser_estacionamento=trim(utf8_encode($select["ser_estacionamento"]));
			$ser_playground=trim(utf8_encode($select["ser_playground"]));
			$ser_camarim=trim(utf8_encode($select["ser_camarim"]));
			$ser_picinaadulto=trim(utf8_encode($select["ser_picinaadulto"]));
			$ser_picinainfantil=trim(utf8_encode($select["ser_picinainfantil"]));
			$ser_cadeira=trim(utf8_encode($select["ser_cadeira"]));
			$ser_camarote=trim(utf8_encode($select["ser_camarote"]));
			$ser_descr=trim(utf8_encode($select["ser_descr"]));
			}
		}						
				
				$ser_tipo0="";
				$ser_tipo1="";
				$ser_tipo2="";
				switch ($ser_local){
					case "0":
						$ser_tipo0 = "checked=\"checked\"";
						break;
					case "1":
						$ser_tipo1 = "checked=\"checked\"";
						break;
					case "2":
						$ser_tipo2 = "checked=\"checked\"";
						break;
				}

				$usu_tipo0="";
				$usu_tipo1="";
				$usu_tipo2="";
				switch ($usu_tipo){
					case "0":
						$usu_tipo0 = "checked=\"checked\"";
						break;
					case "1":
						$usu_tipo1 = "checked=\"checked\"";
						break;
					case "2":
						$usu_tipo2 = "checked=\"checked\"";
						break;
			

	sqlsrv_close($conn);
};

?>
<!DOCTYPE html >
<html >
<head>

<title></title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
	
function VerificaCampox(form) 
{
	if (form.conv_nome.value.length < 1) 
	{
	alert("Digite o nome do convidado.");
	form.conv_nome.focus();
	return false;	
	}
	if (form.conv_email.value.length < 1) 
	{
	alert("Digite o e-mail do convidado.");
	form.conv_email.focus();
	return false;	
	}

		
}
// Initialization for ES Users
</SCRIPT>
</head>
	
<body>

	
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	 <form  action="?pg=15&tp=10&ev=2"  ID="form_contato_prop" name="form_contato_prop"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr style="border: 1px solid #CCC;">
      <td height="30" colspan="2" nowrap="nowrap" class="fundo1">&nbsp;<strong>Dados do Anunciante</strong></td>
      </tr>
    <tr>
      <td width="25" align="left" nowrap="nowrap">&nbsp;</td>
      <td width="1565" height="38" align="left" valign="middle" nowrap="nowrap" class="menu002">
        <table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tbody>
            <tr>
              <td width="4%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Código : <?php echo (str_pad(intval($ser_num), 3, '0', STR_PAD_LEFT)); ?></td>
              <td width="12%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Locação de: <?php echo 'Ambiente'; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;M²: <?php echo $ser_m2; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;Total de Pessoas: <?php echo $ser_totpessoa; ?></td>
              <td width="72%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Formas de pagamento: <strong>Boleto / Cartão de Crédito / Pix / Financeiras.</strong></td>
            </tr>
            </tbody>
        </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tbody>
      <tr>
        <td width="12%" height="20" nowrap="nowrap">Banheiros: <span class="menu002d"><?php echo $ser_banheiro; ?></span></td>
        <td width="12%" height="20" nowrap="nowrap">Cozinha / Copa: <span class="menu002d"><?php echo $ser_cozinha; ?></span></td>
        <td width="12%" height="20" nowrap="nowrap">Palco: <span class="menu002d"><?php echo $ser_palco; ?></span></td>
        <td width="18%" height="20" align="left" nowrap="nowrap" class="menu002">Estacionamento/Veículos: <span class="menu002d"><?php echo $ser_estacionamento; ?></span></td>
        <td width="46%" height="20" nowrap="nowrap" class="menu002"><span class="menu002d">
          Local : <?php 
					if ($ser_tipo0 !=""){ echo 'Aberto'; }
					elseif ($ser_tipo1 !=""){ echo 'Fechado'; }							 
					elseif ($ser_tipo2 !=""){ echo 'Misto'; }									 
			?>
        </span></td>
      </tr>
      <tr>
        <td height="20" nowrap="nowrap">Playground: <span class="menu002d"><?php echo $ser_playground; ?></span></td>
        <td height="20" nowrap="nowrap"> Camarim: <span class="menu002d"><?php echo $ser_camarim; ?></span></td>
        <td height="20" nowrap="nowrap">Picina Adulto: <span class="menu002d"><?php echo $ser_picinaadulto; ?></span></td>
        <td height="20" align="left" nowrap="nowrap" class="menu002">Picina Infantil: <span class="menu002d"><?php echo $ser_picinainfantil; ?></span></td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" nowrap="nowrap">Cadeiras: <span class="menu002d"><?php echo $ser_cadeira; ?></span></td>
        <td height="20" nowrap="nowrap">Camarote: <span class="menu002d"><?php echo $ser_camarote; ?></span></td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
        <td height="20" align="left" nowrap="nowrap" class="menu002">&nbsp;</td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" nowrap="nowrap">&nbsp;</td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
        <td height="20" align="left" nowrap="nowrap" class="menu002">&nbsp;</td>
        <td height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
    </tbody>
  </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">Breve descrição do local:</td>
		      <td>&nbsp;</td>
		      <td width="7%" height="20" align="left" valign="middle">Razão Social: 
		        
	          <td width="64%" align="left" valign="middle" class="menu002d"><?php echo $usu_nome; ?>              	        </tr>
		    <tr>
		      <td colspan="2" rowspan="3" align="left" valign="top" nowrap="nowrap" class="menu002d"><?php echo $ser_descr; ?></td>
		      <td width="10%" align="left" valign="middle">              
		      <td height="20" align="left" valign="middle">Telefone:              
		        
	          <td align="left" valign="middle" class="menu002d"><?php echo formataTelefone($usu_telefone); ?>              
		    </tr>
		    <tr>
		      <td align="left" valign="middle">              
		      <td height="20" align="left" valign="middle">Celular:              
		        
	          <td align="left" valign="middle" class="menu002d"><?php echo formataTelefone($usu_celular); ?>&nbsp;
		          <?php if ($usu_whatsapp == 'checked'){ echo '<img src="/pi_facu/images/whatsapp.png" width="20" height="20" alt=""/>'; }  ?>
            </tr>
		    <tr>
		      <td align="left" valign="middle">              
		      <td align="left" valign="middle">E-mail: </td>
		      <td align="left" valign="middle" class="menu002d"><?php echo $usu_email; ?></td>
		    </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap"><input form="form_eventosCad" type="hidden" name="eve_usuid" id="eve_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/></td>
		      <td align="right" valign="middle">&nbsp;</td>
		      <td align="right" valign="middle">&nbsp;</td>
		      <td align="left" valign="middle">&nbsp;</td>
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">Msg.:
		        <?php 
					if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
					}
					?></td>
		      <td align="right" valign="middle">&nbsp;</td>
		      <td align="right" valign="middle">&nbsp;</td>
	          <td align="left" valign="middle">&nbsp;</td>
		    </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">&nbsp;</td>
		      <td align="right" valign="middle">&nbsp;</td>
		      
			  <td align="right" valign="middle">&nbsp;</td>
		      <td align="left" valign="middle">&nbsp;</td>
		    </tr>
	      </table></td>
    </tr>
    </table>
  
    </form>
			<?php } ?> 
  </div>
			
</body>
</html>