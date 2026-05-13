{{-- Generic booking/inquiry modal — used by x-detail.sidebar --}}
<div id="{{ $modalId }}" class="overlay modal overlay-open:opacity-100 hidden" role="dialog" tabindex="-1">
    <div class="modal-dialog overlay-open:opacity-100">
        <div class="modal-content bg-canvas rounded-2xl">
            <div class="modal-header border-b border-hairline">
                <h3 class="modal-title font-display text-2xl font-medium text-ink">{{ $title }}</h3>
                <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                        aria-label="Close" data-overlay="#{{ $modalId }}">
                    <span class="icon-[tabler--x] size-4"></span>
                </button>
            </div>
            <form action="{{ $submitUrl }}" method="POST">
                @csrf
                <input type="hidden" name="inquiriable_id" value="{{ $bookingFor->getKey() }}">
                <input type="hidden" name="inquiriable_type" value="{{ get_class($bookingFor) }}">
                <div class="modal-body pt-4 space-y-4">
                    <div>
                        <label class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5" for="{{ $modalId }}-name">Full Name</label>
                        <input type="text" required placeholder="John Doe"
                               class="w-full rounded-lg border border-hairline bg-surface px-4 py-2.5 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15"
                               id="{{ $modalId }}-name" name="full_name" />
                    </div>
                    <div>
                        <label class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5" for="{{ $modalId }}-email">Email</label>
                        <input type="email" required placeholder="john@doe.com"
                               class="w-full rounded-lg border border-hairline bg-surface px-4 py-2.5 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15"
                               id="{{ $modalId }}-email" name="email" />
                    </div>
                    <div>
                        <label class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5" for="{{ $modalId }}-message">Message</label>
                        <textarea rows="4" placeholder="Tell us about your trip — group size, dates, anything..."
                                  class="w-full rounded-lg border border-hairline bg-surface px-4 py-2.5 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15"
                                  id="{{ $modalId }}-message" name="message"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-t border-hairline gap-3 px-6 py-4">
                    <button type="button"
                            class="inline-flex items-center justify-center rounded-full border border-hairline bg-transparent px-5 py-2.5 text-[13px] font-semibold text-ink-muted hover:border-ink hover:text-ink"
                            data-overlay="#{{ $modalId }}">
                        Cancel
                    </button>
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-full bg-terracotta px-6 py-2.5 text-[13px] font-semibold text-white hover:bg-terracotta-hover">
                        {{ $type === 'booking' ? 'Request Booking' : 'Send Inquiry' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
