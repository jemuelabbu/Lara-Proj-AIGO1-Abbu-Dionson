@if (session('toast'))
    @php($toast = session('toast'))
    <div class="fixed right-4 bottom-4 z-[100] flex w-[calc(100%-2rem)] max-w-sm flex-col gap-2" data-toast-region>
        <div class="toast {{ ($toast['type'] ?? 'success') === 'error' ? 'toast-error' : 'toast-success' }}" data-toast>
            <span class="flex-1">{{ $toast['message'] ?? '' }}</span>
            <button type="button" class="-mr-1 rounded p-0.5 opacity-70 transition-opacity hover:opacity-100" data-toast-close aria-label="Dismiss">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                    <path d="M18 6 6 18" /><path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    </div>
@endif
