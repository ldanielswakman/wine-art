<? // Menu items ?>
<ul>
  <? foreach ($site->pages()->visible() as $page) : ?>
    <li>
      <a href="<?=$page->url() ?>" class="<? e($page->isOpen(), 'isActive') ?>"><?= strtolower($page->title()->html()) ?></a>
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
