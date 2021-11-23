<section class="ts-newslatter section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ts-newslatter-content">
                    <h2>
                        Bülten için kaydolun

                    </h2>
                    <p>
                        Bültenimize katılın ve gelen kutunuzda güncellemeleri alın. Size spam göndermeyeceğiz ve gizliliğinize saygı duyuyoruz.
                    </p>
                </div>
            </div>
            <!-- col end-->

            <div class="col-lg-6 align-self-center">
                <div class="newsletter-form">
                    <form action="{{ route("subscriber.store") }}" method="post" class="media align-items-end">
                        @csrf
                        <div class="email-form-group media-body">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <input type="email" name="mail" id="newsletter-form-email" class="form-control" placeholder="Email Adresinizi Giriniz" autocomplete="off">
                        </div>
                        <div class="d-flex ts-submit-btn">
                            <button class="btn btn-primary">Abone Ol</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section
