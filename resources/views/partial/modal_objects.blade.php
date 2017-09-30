<!-- Modal -->
<div class="modal fade" id="ObjectModal" tabindex="-1" role="dialog" aria-labelledby="ObjectModalLabel"
     aria-hidden="true">
    <div class="modal-dialog objects-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ObjectModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header d-block">
                <button type="button" class="btn btn-remark-primary" id="submit-objects">ОК</button>
                <button type="button" class="btn btn-remark-warning" id="reset-objects">Очистить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
            <div class="modal-body">
                <div class="loading-container" style="text-align: center">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
                <div id="object-list" class="row d-flex"></div>
            </div>
        </div>
    </div>
</div>