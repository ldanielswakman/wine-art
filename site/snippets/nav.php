<nav>
  <ul>
    <? foreach ($site->pages()->visible() as $page) : ?>
      <li>
        <a href="<?=$page->url() ?>"><?= strtolower($page->title()->html()) ?></a>
      </li>
    <? endforeach ?>
  </ul>
</nav>
