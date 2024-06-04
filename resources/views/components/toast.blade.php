<div class="toast">
    <div
        class="
        alert alert-light rounded-lg py-3.5
        @if ($type === 'info') border border-cyan-400 text-cyan-600 bg-cyan-100 @endif
        @if ($type === 'error') border border-red-400 text-red-600 bg-red-100 @endif
        @if ($type === 'warning') border border-yellow-400 text-yellow-600 bg-yellow-100 @endif
        @if ($type === 'primary') border border-primary-400 text-primary-600 bg-primary-100 @endif
    ">
        <span class="material-symbols-outlined">
            @switch($type)
                @case('error')
                    error
                @break

                @case('warning')
                    warning
                @break

                @case('info')
                    info
                @break
            @endswitch
        </span>
        <div class="flex items-center gap-1">
            <span>{{ $slot }}</span>
            <button
                class="
                    btn btn-circle btn-sm
                    @if ($type === 'info') bg-cyan-100 text-cyan-600 border-none hover:bg-cyan-200 @endif
                    @if ($type === 'error') bg-red-100 text-red-600 border-none hover:bg-red-200 @endif
                    @if ($type === 'warning') bg-yellow-100 text-yellow-600 border-none hover:bg-yellow-200 @endif
                "
                onclick="closeToast(this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    function closeToast(button) {
        // Cari elemen toast terdekat dan sembunyikan
        const toast = button.closest('.toast');
        if (toast) {
            toast.style.display = 'none';
        }
    }
</script>
