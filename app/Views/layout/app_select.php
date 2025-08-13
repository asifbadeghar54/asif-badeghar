<?php
/**
 * Required variables:
 * - $buttonId (string): Unique ID for dropdown
 * - $buttonClass (string): Bootstrap button class (e.g., btn btn-primary)
 * - $buttonIcon (string): Icon HTML before label
 * - $buttonLabel (string): Button label
 * - $menuItems (array): Each item as [
 *     'label' => 'Download',
 *     'icon' => base_url('uploads/download.png'),
 *     'href' => 'url' OR
 *     'onclick' => 'someJSFunction()'
 * ]
 * - $prefixContent (optional string): HTML shown before the button (e.g. timestamp)
 */
?>

<li style="font-size: 10px; display: flex; align-items: center; justify-content: center; width: max-content; padding: 4px;">
    <?php if (!empty($prefixContent)) echo $prefixContent; ?>

    <div class="btn-group">
        <button class="<?= $buttonClass ?>" type="button" id="<?= $buttonId ?>"
            data-bs-toggle="dropdown" aria-expanded="false">
            <?= $buttonIcon ?> <?= $buttonLabel ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="<?= $buttonId ?>">
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <?php if (!empty($item['href'])): ?>
                        <a class="dropdown-item" href="<?= $item['href'] ?>">
                            <?= $item['label'] ?>
                            <?php if (!empty($item['icon'])): ?>
                                <img src="<?= $item['icon'] ?>" class="popup-icon" />
                            <?php endif; ?>
                        </a>
                    <?php elseif (!empty($item['onclick'])): ?>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="<?= $item['onclick'] ?>">
                            <?= $item['label'] ?>
                            <?php if (!empty($item['icon'])): ?>
                                <img src="<?= $item['icon'] ?>" class="popup-icon" />
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</li>