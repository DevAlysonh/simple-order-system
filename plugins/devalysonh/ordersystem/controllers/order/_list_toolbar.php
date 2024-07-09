<div data-control="toolbar loader-container">
    <a
        href="<?= Backend::url('devalysonh/ordersystem/order/create') ?>"
        class="btn btn-primary">
        <i class="icon-plus"></i>
        <?= __("New :name", ['name' => 'Order']) ?>
    </a>

    <div class="toolbar-divider"></div>

    <button
        class="btn btn-success"
        data-request="onMassActionCloseOrder"
        data-request-message="<?= __("Faturando...") ?>"
        data-request-confirm="<?= __("Tem certeza que deseja faturar todos estes pedidos?") ?>"
        data-list-checked-trigger
        data-list-checked-request
        disabled>
        <i class="icon-check"></i>
        <?= __("Faturar Em Massa") ?>
    </button>
	<button
        class="btn btn-secondary"
        data-request="onDelete"
        data-request-message="<?= __("Deleting...") ?>"
        data-request-confirm="<?= __("Are you sure?") ?>"
        data-list-checked-trigger
        data-list-checked-request
        disabled>
        <i class="icon-delete"></i>
        <?= __("Delete") ?>
    </button>
</div>
