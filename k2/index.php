<?php session_start(); 
 
if(isset($_REQUEST['Submit'])){ 
    // ����������֤�Ĵ���
    if(empty($_SESSION['6_letters_code'] ) ||
        strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
    { 
        $msg="��֤ʧ�ܣ�";
    }else{
         $msg="��֤success��";
    }
} 
?>
<style type="text/css">
.table {
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    color:#333;
    background-color:#E4E4E4;
}
.table td {
    background-color:#F8F8F8;
}
</style>
 
<form action="" method="post" name="form1" id="form1" >
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> ��֤��:</td>
      <td><img src="captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>�������������֤�� :</label>
        <br>
        <input id="6_letters_code" name="6_letters_code" type="text">
        <br>
        �޷���ͼƬ�𣿵�� <a href='javascript: refreshCaptcha();'>here</a> ˢ��
        </p></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" onclick="return validate();" value="�ύ"></td>
    </tr>
  </table>
</form>
<script type='text/javascript'>
function refreshCaptcha()
{
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	
}
</script>