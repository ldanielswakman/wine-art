<div style="font-family: Apercu, sans-serif;">

  <div style="padding: 50px 15px; text-align: center;">
    <? snippet('email-logo-base64') ?>
  </div>

  <div style="padding: 30px 15px; text-align: center; background-color: #e8ebed;">

    <p style="text-align: center;">
      New message via the wine-art.co contact form:
    </p>
    
    <table style="display: inline-block; text-align: left; min-width: 290px;">
      <?
      foreach ($data as $field => $value):
      if (is_array($value)) {
        $value = implode(', ', array_filter($value, function ($i) {
          return $i !== '';
        }));
      }
      ?>
        <tr>
          <td style="padding: 5px 10px; color: #909599;"><? echo ucfirst($field) ?></td>
          <td ><? echo $value ?></td>
        </tr>
      <? endforeach ?>
    </table>

  </div>

  <div style="padding: 15px; text-align: center; color: #cad1d9;">
    <p><em>This message was automatically sent from wine-art.co</em></p>
  </div>

</div>
