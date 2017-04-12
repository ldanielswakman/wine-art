<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body style="margin: 0; padding: 0; font-family: Apercu, sans-serif;">

      <div style="padding: 50px 15px; text-align: center;">
        <? snippet('email-logo-base64') ?>
      </div>

      <div style="padding: 30px 15px; text-align: center; background-color: #e8ebed;">

        <p style="text-align: center;">
          New message via <b>wine-art.co</b> contact form:
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

  </body>
</html>
