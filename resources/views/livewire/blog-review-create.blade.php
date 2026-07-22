<div>
    <section class="review-form-one">
        <div class="container">
            <div class="review-form-one__inner">
                <h3 class="review-form-one__title">Add a comment</h3>
                @if($message = Session::get('message'))
                <x-alert type="success" :message="$message"></x-alert>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="submitReview" class="review-form-one__form">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="review-form-one__input-box text-message-box">
                               @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                                <textarea wire:model.lazy="comment" name="message" placeholder="Write comment"></textarea>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="review-form-one__input-box">
                                <input type="text" placeholder="Your name" wire:model.lazy="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="review-form-one__input-box">
                                <input type="email" placeholder="Email address" wire:model.lazy="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="recaptcha" wire:model="recaptcha">
                    <div class="row">
                        <div class="col-xl-12">
                            <button type="submit" class="thm-btn review-form-one__btn">Submit comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'submit'}).then(function (token) {
                @this.set('recaptcha', token);
            });
        });
    </script>
</div>
