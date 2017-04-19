<div style="font-family: Apercu, sans-serif;">

  <div style="padding: 50px 15px; text-align: center;">
    <? snippet('email-partial-logo') ?>
  </div>

  <div style="padding: 30px 15px; text-align: center; background-color: #e8ebed;">

    <?
    $product = (isset($data['product'])) ? ucfirst($data['product']) : 'Unknown';
    $price = (isset($data['price'])) ? $data['price'] : 'Unknown';
    $success_msg = (isset($options['params']['success_msg'])) ? $options['params']['success_msg'] : 'Thank you for your purchase at wine-art.co! In order to complete the purchase, please make a bank transfer with the following info:';
    $bank_info = (isset($options['params']['bank_info'])) ? $options['params']['bank_info'] : 'Unknown';
    ?>
    
    <div style="text-align: center;">
      <?= $success_msg ?>
    </div>
    <br>

    <table style="display: inline-block; text-align: left; min-width: 290px;">
      <tr>
        <td style="padding: 5px 10px; color: #909599;">Product</td>
        <td ><?= $product ?></td>
      </tr>
      <tr>
        <td style="padding: 5px 10px; color: #909599;">Price</td>
        <td ><?= $price ?></td>
      </tr>
      <tr>
        <td style="padding: 5px 10px; color: #909599; vertical-align: top;">Bank transfer info</td>
        <td ><?= strip_tags($bank_info, '<br><b><i><em><strong><a>'); ?></td>
      </tr>
    </table>

  </div>

  <? snippet('email-partial-footer') ?>

  </div>
