<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-source inline-flex items-center px-4 py-2 bg-red-600 border border-transparent shadow-lg rounded-md font-semibold text-md text-white tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>