<nav>
  <ul>
    <? foreach ($site->pages()->visible() as $page) : ?>
      <li>
        <a class="<? e($page->isOpen(), 'isActive') ?>" href="<?=$page->url() ?>"><?= strtolower($page->title()->html()) ?></a>
      </li>
    <? endforeach ?>
  </ul>
</nav>
