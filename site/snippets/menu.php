<? // Menu items ?>
<ul>
  <? foreach ($site->pages()->visible() as $p) : ?>
    <? if ($p->template() === 'external'): ?>
      <li>
        <a href="<?= $p->forward_url() ?>" target="_blank" class="external"><?= strtolower($p->title()->html()) ?></a></li>
    <? else : ?>
      <li>
        <a href="<?= $p->url() ?>" class="<? e($p->isOpen(), 'isActive') ?>"><?= strtolower($p->title()->html()) ?></a>
      </li>
    <? endif ?>
  <? endforeach ?>
</ul>

<? // Language switcher ?>
<ul class="menu-language">
  <? foreach ($site->languages() as $language) : ?>
    <li>
      <a href="<?=$page->url($language->code()) ?>" class="<? e($site->language() == $language, 'isActive') ?>">
        <?= strtoupper(html($language->code())) ?>  
      </a>
    </li>
  <? endforeach ?>
</ul>
