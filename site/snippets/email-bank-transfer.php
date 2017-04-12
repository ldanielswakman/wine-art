<div style="font-family: Apercu, sans-serif;">

  <div style="padding: 50px 15px; text-align: center;">
    <? snippet('email-logo-base64') ?>
  </div>

  <div style="padding: 30px 15px; text-align: center; background-color: #e8ebed;">

    <p style="text-align: center;">
      Thank you for your purchase at wine-art.co! In order to complete the purchase, please make the bank transfer with the following info:
    </p>

    <?
    $product = (isset($data['product'])) ? ucfirst($data['product']) : 'Unknown';
    $price = (isset($data['price'])) ? ucfirst($data['price']) : 'Unknown';
    ?>
    
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
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="padding: 5px 10px; color: #909599; vertical-align: top;">Bank transfer info</td>
        <td >
          WineArt Projects GmbH<br>
          Culmannstrasse 46, 8006 Zurich<br>
          IBAN: NL43ABNA0524664153
        </td>
      </tr>
    </table>

  </div>

  <div style="padding: 15px; text-align: center; color: #cad1d9;">
    <p><em>This message was automatically sent from wine-art.co</em></p>
  </div>

  </div>
