<div class="w-full h-full bg-blue-50">
    <div class="h-64 ">
        <form action="/{{ app()->currentLocale() }}/search/query" method="GET">
            <div class="flex flex-col sm:flex-row items-center sm:items-end w-full gap-6">
                <div class="flex-1 w-full sm:max-w-md">
                    {{-- <label for="">
                        Search for
                    </label> --}}
                    <input class="input w-full" placeholder="Search" name="query" required
                        value="{{ isset($query) ? $query : '' }}" />
                </div>
            </div>
            <div class="flex w-full sm:max-w-sm  mt-4   gap-2 justify-center">
                {{-- <label for="">
                    Type
                </label> --}}
                <select name="type"
                    data-select='{
                    "placeholder": "Select type...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "advance-select-toggle",
                    "dropdownClasses": "advance-select-menu max-h-48 overflow-y-scroll",
                    "optionClasses": "advance-select-option selected:active",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                    "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                }'
                    class="hidden ">
                    <option value="">Filter Type</option>
                    @foreach ($searchFilters as $searchFilter)
                        <option value="{{ $searchFilter->value }}" @selected($searchFilter->value == $type)>
                            {{ $searchFilter->getLabel() }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-secondary  " type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
