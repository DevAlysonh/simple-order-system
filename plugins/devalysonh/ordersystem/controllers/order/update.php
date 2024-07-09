<?php Block::put('breadcrumb') ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= Backend::url('devalysonh/ordersystem/order') ?>">Order</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= e($this->pageTitle) ?></li>
    </ol>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <?= Form::open(['class' => 'd-flex flex-column h-100']) ?>

		<input type="hidden" name="order_id" value="<?= $this->vars['formModel']->id ?>">

        <div class="flex-grow-1">
            <?= $this->formRender() ?>
        </div>

        <div class="form-buttons">
            <div data-control="loader-container">
                <button
                    type="submit"
                    data-request="onSave"
                    data-request-data="{ redirect: 0 }"
                    data-hotkey="ctrl+s, cmd+s"
                    data-request-message="<?= __("Saving :name...", ['name' => $formRecordName]) ?>"
                    class="btn btn-primary">
                    <?= __("Save") ?>
                </button>
                <button
                    type="button"
                    data-request="onSave"
                    data-request-data="{ close: 1 }"
                    data-browser-redirect-back
                    data-hotkey="ctrl+enter, cmd+enter"
                    data-request-message="<?= __("Saving :name...", ['name' => $formRecordName]) ?>"
                    class="btn btn-default">
                    <?= __("Save & Close") ?>
                </button>
				<?php if ($this->vars['formModel']->status !== 'pago'): ?>
					<button
        				class="btn btn-success"
        				data-request="onCloseOrder"
        				data-request-message="<?= __("Faturando Pedido...") ?>"
        				data-request-confirm="<?= __("Tem certeza que deseja faturar este pedido?") ?>"
        				data-list-checked-trigger
        				data-list-checked-request
					>
        					<i class="icon-check"></i>
        					<?= __("Faturar Pedido") ?>
    				</button>
				<?php endif ?>
                <button
                    type="button"
                    class="oc-icon-delete btn-icon danger pull-right"
                    data-request="onDelete"
                    data-request-message="<?= __("Deleting :name...", ['name' => $formRecordName]) ?>"
                    data-request-confirm="<?= __("Delete this record?") ?>">
                </button>
                <span class="btn-text">
                    <span class="button-separator"><?= __("or") ?></span>
                    <a
                        href="<?= Backend::url('devalysonh/ordersystem/order') ?>"
                        class="btn btn-link p-0">
                        <?= __("Cancel") ?>
                    </a>
                </span>
            </div>
        </div>

    <?= Form::close() ?>

<?php else: ?>

    <p class="flash-message static error">
        <?= e($this->fatalError) ?>
    </p>
    <p>
        <a
            href="<?= Backend::url('devalysonh/ordersystem/order') ?>"
            class="btn btn-default">
            <?= __("Return to List") ?>
        </a>
    </p>

<?php endif ?>
