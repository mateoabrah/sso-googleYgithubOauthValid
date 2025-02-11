<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {!! __('Gràcies per registrar-te! Abans de començar, podries verificar el teu email fent clic
        a l\'enllaç que acabem d\'enviar-te per correu? <br> <br>Si no has rebut l\'email, amb gust t\'enviem
        un altre.') !!}

    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('"S\'ha enviat un nou enllaç de verificació a l\'adreça de correu electrònic que vas proporcionar durant el registre."') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar correu de verificació') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Sortir') }}
            </button>
        </form>
    </div>
</x-guest-layout>
