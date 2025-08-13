<?php
$page_title ??= '';
$breadcrumbs ??= [];
?>

<div class="d-md-flex align-items-center justify-content-between mb-7">
    <div class="mb-4 mb-md-0">
        <h2 class="fs-5 mb-2"><?= esc($page_title) ?></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="<?= base_url('dashboard') ?>">Dashboard</a>
                </li>
                <?php foreach ($breadcrumbs as $crumb): ?>
                    <?php if (isset($crumb['url'])): ?>
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?= esc($crumb['url']) ?>">
                                <?= esc($crumb['label']) ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= esc($crumb['label']) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>
</div>