<?php
//Carga de las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once("../modelo/Conexion.php");


    session_start();
 
// $con = Conexion::getConection();
// $sql = "SELECT CorreoElectronico FROM usuarios";
// $resultado = $con->prepare($sql);
// $resultado->execute();
// $resultados = $resultado -> fetchAll(PDO::FETCH_OBJ); 

// if($resultado -> rowCount() > 0)   { 
//     foreach($resultados as $mailes) { 
//     echo " <tr> 
//     <td>".$mailes -> CorreoElectronico."</td>
   
    
//     </tr>";
    
    
    
//        }
//      }
$mail = new PHPMailer(true);


$mailUsuario = $_POST["email"];

$con = Conexion::getConection();
$sql = "SELECT NombreUsuario,Codigo FROM usuarios WHERE CorreoElectronico = '$mailUsuario'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $codigo= $result -> Codigo;
    $nombre= $result -> NombreUsuario;
  }
}



try {
    //Valores dependientes del servidor que utilizamos
    
    $mail->isSMTP();                                           //Para usaar SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Nuestro servidor SMTMP smtp.gmail.com en caso de usar gmail
    $mail->SMTPAuth   = true;    
    /* 
    * SMTP username y password Poned los vuestros. La contraseña es la que nos generó GMAIL
    */
    $mail->Username   = 'nigirivalencia@gmail.com';             
    $mail->Password   = 'udia avnm qedy ycqd';    
    /*
    * Encriptación a usar ssl o tls, dependiendo cual usemos hay que utilizar uno u otro puerto
    */            
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
    $mail->Port = "465";
    /**TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                         
     * $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     * $mail->Port       = 587;  
     */


    /*
    Receptores y remitente
    */
//Remitente
    $mail->setFrom('nigirival@gmail.com', 'Nigiri staff');
//Receptores. Podemos añadir más de uno. El segundo argumento es opcional, es el nombre
    $mail->addAddress($mailUsuario);     //Add a recipient
    //$mail->addAddress('ejemplo@example.com'); 

    //Copia
    //$mail->addCC('cc@example.com');
    //Copia Oculta
    //$mail->addBCC('bcc@example.com');

    //Archivos adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
$body = 'Si quieres disfrutar de tus pedidos y reservas, verifíca tu cuenta en el siguiente enlace con tu código: </br>'.$codigo.'</br>
        <a href="http://localhost/ProyectoDW2/vista/verificar.php">aqui</a>';
    //Contenido
    //Si enviamos HTML
    $mail->isHTML(true);    
    $mail->CharSet = "UTF8";    
    //Asunto
    $mail->Subject = 'Bienvenido a onigiri: '.$nombre;
    //Conteido HTML
    $mail->Body    = $body;
    //Contenido alternativo en texto simple
    $mail->AltBody = 'mensaje alternativo.';
    //Enviar correo
    $mail->send();
    echo 'El mensaje se ha enviado con exito';

     header("location: ../vista/verificar.php");
    
} catch (Exception $e) {
    echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
    echo $mailUsuario;
    
    
    
}
?>