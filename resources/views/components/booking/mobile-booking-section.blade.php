<div class="fixed bottom-0 w-full card-actions justify-center pt-2 pb-2 bg-white z-10  xl:hidden">
    <button class="btn btn-primary  uppercase" aria-haspopup="dialog" aria-expanded="false"
        aria-controls="mobile-booking-section-booking-modal" data-overlay="#mobile-booking-section-booking-modal">Book
        Trip</button>
    <button class="btn btn-info  uppercase" aria-haspopup="dialog" aria-expanded="false"
        aria-controls="mobile-booking-section-inquiry-modal"
        data-overlay="#mobile-booking-section-inquiry-modal">Inquiry</button>
    <a href="{{ $bookingFor->getWhatsappUrl() }}" class="btn btn-success uppercase text-white" target="_blank">
        <span class="icon-[tabler--brand-whatsapp]"></span>
        Whatsapp
    </a>
    @push('modals')
        {{-- Booking form modal --}}
        <div id="mobile-booking-section-booking-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Booking</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#mobile-booking-section-booking-modal"><span
                                class="icon-[tabler--x] size-4"></span></button>
                    </div>
                    <form action="/bookings/booking" method="POST">
                        @csrf
                        <input type="hidden" name="inquiriable_id" value="{{ $bookingFor->getKey() }}">
                        <input type="hidden" name="inquiriable_type" value="{{ get_class($bookingFor) }}">
                        <div class="modal-body pt-0">
                            <div class="w-full my-2">
                                <label class="label label-text" for="full_name"> Full Name </label>
                                <input type="text" placeholder="John Doe" class="input" id="full_name"
                                    name="full_name" />
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
                                data-overlay="#mobile-booking-section-booking-modal">Close</button>
                            <button type="submit" class="btn btn-primary">Request Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Inquiry form modal --}}
        <div id="mobile-booking-section-inquiry-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Inquiry</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#mobile-booking-section-inquiry-modal"><span
                                class="icon-[tabler--x] size-4"></span></button>
                    </div>
                    <form action="/bookings/inquiry" method="POST">
                        @csrf
                        <input type="hidden" name="inquiriable_id" value="{{ $bookingFor->getKey() }}">
                        <input type="hidden" name="inquiriable_type" value="{{ get_class($bookingFor) }}">
                        <div class="modal-body pt-0">
                            <div class="w-full my-2">
                                <label class="label label-text" for="full_name"> Full Name </label>
                                <input type="text" placeholder="John Doe" class="input" id="full_name"
                                    name="full_name" />
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
                                data-overlay="#mobile-booking-section-inquiry-modal">Close</button>
                            <button type="submit" class="btn btn-primary">Inquire Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush
</div>
