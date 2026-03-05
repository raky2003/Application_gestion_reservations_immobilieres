<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 text-white border border-transparent rounded-lg font-semibold text-xs uppercase tracking-widest shadow-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2']) }} style="background-image: linear-gradient(135deg, #0f4c81, #0ea5e9);">
    {{ $slot }}
</button>
