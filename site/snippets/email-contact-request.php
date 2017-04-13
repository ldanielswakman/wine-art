<div style="font-family: Apercu, sans-serif;">

  <div style="padding: 50px 15px; text-align: center;">
    <? snippet('email-partial-logo') ?>
  </div>

  <div style="padding: 30px 15px; text-align: center; background-color: #e8ebed;">

    <p style="text-align: center;">
      New message via the wine-art.co contact form:
      <span style="display: block; margin-top: 0.25em; color: #cad1d9"><?= date('d M Y G:i:s')?></span>
    </p>
    
    <table style="display: inline-block; margin-top: 1em; text-align: left; min-width: 290px;">
      <?
      foreach ($data as $field => $value):
      if (is_array($value)) {
        $value = implode(', ', array_filter($value, function ($i) {
          return $i !== '';
        }));
      }
      if(strlen($value) < 1) {
        continue;
      }
      ?>
        <tr>
          <td style="padding: 5px 10px; color: #909599;"><? echo ucfirst($field) ?></td>
          <td ><? echo $value ?></td>
        </tr>
      <? endforeach ?>
    </table>

  </div>

  <? snippet('email-partial-footer') ?>

</div>
