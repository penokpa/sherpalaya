@props([
    'url' => null,           // Optional deep-link (e.g. trek-specific prefilled message)
    'label' => null,         // Overrides the default label text
])

@php
    $waNumber = config('services.whatsapp.number');
    $href = $url ?: ($waNumber ? 'https://wa.me/' . $waNumber : null);
    $labelText = $label ?? __('home.whatsapp_label');
@endphp

@if ($href)
    <a href="{{ $href }}"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="{{ $labelText }}"
       class="group fixed bottom-5 right-5 z-40 inline-flex items-center gap-2.5 rounded-full
              bg-[#25D366] p-3.5 text-white shadow-lg shadow-black/15 ring-1 ring-black/5
              transition duration-200 hover:-translate-y-0.5 hover:bg-[#1da856] hover:shadow-xl
              focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#25D366]
              sm:bottom-7 sm:right-7 sm:px-5 sm:py-3.5">
        <span class="icon-[ph--whatsapp-logo-fill] size-6 sm:size-5" aria-hidden="true"></span>
        <span class="hidden text-sm font-medium leading-none sm:inline">{{ $labelText }}</span>
    </a>
@endif
