<div class="sp_wrap">
    <?= $this->renderLayer('main_head'); ?>

    <div class="sp_wrap_ip_info">
        <h2>IP:</h2>
        <h3><?= $this->d('ip_data')['ip'] ?? ''; ?></h3>
        <h2><?=$this->t('sp_country')?>:</h2>
        <h3><?= $this->d('ip_data')['country'] ?? ''; ?></h3>
        <h2><?=$this->t('sp_city')?>:</h2>
        <h3><?= $this->d('ip_data')['city'] ?? ''; ?></h3>
    </div>

    <?= $this->renderLayer('main_footer'); ?>
</div>