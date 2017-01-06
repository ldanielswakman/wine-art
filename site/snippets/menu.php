<? // Menu items ?>
<ul>
  <? foreach ($site->pages()->visible() as $p) : ?>
    <li>
      <a href="<?=$p->url() ?>" class="<? e($p->isOpen(), 'isActive') ?>"><?= strtolower($p->title()->html()) ?></a>
    </li>
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
