<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    @if(session()->has('message'))
        {{ session()->get('message')}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Editar aluno</h2>
                    <form method="POST" action="{{route('curso.update',['curso' => $curso->id])}}">
                        @method('PUT')
                        @csrf
                        <input type="hidden">
                        <div>
                            <x-input-label for="titulo" :value="__('Titulo')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{$curso->titulo}}" required autofocus autocomplete="titulo" />
                            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" value="{{$curso->descricao}}" required autofocus autocomplete="titulo" />
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-3">
                            {{ __('Editar') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
