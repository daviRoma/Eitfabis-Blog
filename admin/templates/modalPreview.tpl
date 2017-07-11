<!-- Modal window for edit tables row -->
<div id="previewModal" class="modal-preview">
    <div class="modal-content-preview">
        <div class="modal-body-preview">
            <header>
                <div class="row">
                    <div class="col-md-12 box-img">
                        <img class="img-responsive" src="../{$background}">
                        <div class="box-txt-hover">
                            <h1 class="txt-hover"><strong>{$title}</strong></h1>
                            <hr class="small">
                            <span class="txt-hover">{$subtitle}</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="preview-container" id="modalPreview-content">
                {$preview_content}
            </div>
        </div>
        <div class="modal-footer-preview">
            <hr style="margin-bottom: 13px;">
            <div class="footer-mailchimp">
                <div class="container text-center">
                    <h2>Want more from 24CinL?</h2>
                    <h5>Subscribe to our mailing list to receive an update when new items arrive!</h5>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group input-group-lg">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email address...">
                            <span class="input-group-btn">
                                <button name="subscribe" class="btn btn-primary">Subscribe!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
