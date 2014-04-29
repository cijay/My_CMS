<div id="T-Shirt">
<?php
if(isset($_GET['return']))
    switch($_GET['return']){
    case '0':
        echo '<p class="boutique" style="color:GREEN">Transaction réussie</p>';
        break;
    case '1':
        echo '<p class="boutique" style="color:RED">Transaction échouée</p>';
        break;
    }
?>
    <form id="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <p class="boutique" style="margin-bottom:20px;">42€</p>
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="sell_1335131659_biz@gmail.com">
        <input type="hidden" name="lc" value="FR">
        <input type="hidden" name="item_name" value="T-Shirt">
        <input type="hidden" name="amount" value="35.00">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="button_subtype" value="services">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="tax_rate" value="19.600">
        <input type="hidden" name="shipping" value="0.14">
        <input name="return" type="hidden" value="http://localhost:8888/tp6/index.php?page=boutique&return=0" />
        <input name="cancel_return" type="hidden" value="http://localhost:8888/tp6/index.php?page=boutique&return=1" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
        <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne 
        la plus simple et la plus sécurisée !">
        <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
    </form>

</div>
