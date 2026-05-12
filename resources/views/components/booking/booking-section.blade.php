<div class=" card-body bg-gray-100 mt-4 font-body shadow-md shadow-gray-300 rounded-md">
    <div class="card-actions justify-center">
        {{-- Booking --}}

        <button type="button" class="btn btn-primary btn-wide uppercase h-full" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="booking-section-booking-modal"
            data-overlay="#booking-section-booking-modal">
            {{ __('show-page.book') }}
        </button>


        {{-- Inquiry --}}

        <button type="button" class="btn btn-info btn-wide uppercase h-full" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="booking-section-inquiry-modal" data-overlay="#booking-section-inquiry-modal">
            {{ __('show-page.inquire') }}
        </button>
    </div>
</div>

<a href="{{ $bookingFor->getWhatsappUrl() }}" class="fixed bottom-5 right-4  bg-opacity-80 " target="_blank">
    <div class="flex flex-col justify-center items-center z-50">
        <span class="icon-[ph--whatsapp-logo-duotone] size-15 text-green-500 hover:size-16 hover:text-green-600 animate-bounce"></span>
        <span class="glass rounded-lg px-2 font-oswald">Get In Touch
        </span>
    </div>
</a>

@push('modals')
    {{-- Booking form modal --}}
    <div id="booking-section-booking-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
        tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Booking</h3>
                    <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                        data-overlay="#booking-section-booking-modal"><span class="icon-[tabler--x] size-4"></span></button>
                </div>
                <form action="/{{ app()->currentLocale() }}/bookings/booking" method="POST">
                    @csrf
                    <input type="hidden" name="inquiriable_id" value="{{ $bookingFor->getKey() }}">
                    <input type="hidden" name="inquiriable_type" value="{{ get_class($bookingFor) }}">
                    <div class="modal-body pt-0">
                        <div class="w-full my-2">
                            <label class="label label-text" for="full_name"> Full Name </label>
                            <input type="text" placeholder="John Doe" class="input" id="full_name" name="full_name" />
                        </div>
                        <div class="w-full my-2">
                            <label class="label label-text" for="email"> Email </label>
                            <input type="email" placeholder="john@doe.com" class="input" id="email" name="email" />
                        </div>

                        <div class="w-full my-2">
                            <label class="label label-text" for="message"> Message </label>
                            <textarea class="textarea" placeholder="Your message" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary"
                            data-overlay="#booking-section-booking-modal">Close</button>
                        <button type="submit" class="btn btn-primary">Request Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Inquiry form modal --}}
    <div id="booking-section-inquiry-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
        tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Inquiry</h3>
                    <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                        data-overlay="#booking-section-inquiry-modal"><span class="icon-[tabler--x] size-4"></span></button>
                </div>
                <form action="/{{ app()->currentLocale() }}/bookings/inquiry" method="POST">
                    @csrf
                    <input type="hidden" name="inquiriable_id" value="{{ $bookingFor->getKey() }}">
                    <input type="hidden" name="inquiriable_type" value="{{ get_class($bookingFor) }}">
                    <div class="modal-body pt-0">
                        <div class="w-full my-2">
                            <label class="label label-text" for="full_name"> Full Name </label>
                            <input type="text" placeholder="John Doe" class="input" id="full_name" name="full_name" />
                        </div>
                        <div class="w-full my-2">
                            <label class="label label-text" for="email"> Email </label>
                            <input type="email" placeholder="john@doe.com" class="input" id="email"
                                name="email" />
                        </div>

                        <div class="w-full my-2">
                            <label class="label label-text" for="message"> Message </label>
                            <textarea class="textarea" placeholder="Your message" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary"
                            data-overlay="#booking-section-inquiry-modal">Close</button>
                        <button type="submit" class="btn btn-primary">Inquire Nows</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
