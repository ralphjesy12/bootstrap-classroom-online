<?  
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

session_start();  
if(isset($_SESSION['name'])){  
    $text = $_POST['text'];  
      
    $fp = fopen("log.html", 'a');  
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");  
    fclose($fp);  
}  
?>  