<?php if (count($form->errors()) > 0): ?>
    <div class="uniform-errors">
        <?php foreach ($form->errors() as $key => $error): ?>
            <div class="uniform-errors__item bg-softred c-white u-pv05 u-ph1 u-inlineblock u-triangle-topleft u-mb075">
                <?php echo implode('<br>', $error) ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
