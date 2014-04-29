<?php
if(!cookie_verif()){
    $display='display:block;';
}
else{
    $display='display:none;';
}
echo '<div id="login" style="'.$display.'">';
?>
<h1><a href="../index.php"></a></h1>

<form name="loginform" id="loginform" >
    <p>
        <label>Identifiant<br />
        <input type="text" name="login" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
    </p>
    <p>
        <label>Mot de passe<br />
        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
    </p>
    <p class="submit">
        <input type="submit" class="button-primary" onclick="admin_cookie_set();" value="Se connecter" tabindex="100" />
    </p>
</form>

</div>
