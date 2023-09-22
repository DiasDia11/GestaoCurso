<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Alunos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if(session()->has('message'))
                            {{ session()->get('message')}}
                        @endif
                    <h1>Delete Aluno</h2>
                    <form method="POST" action="{{ route('aluno.destroy', ['aluno' => $aluno->id]) }}">
                        @method('delete')
                        @csrf
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" disabled class="block mt-1 w-full" type="text" name="nome" value="{{$aluno->nome}}" required autofocus autocomplete="titulo" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('E-mail')" />
                            <x-text-input id="email" disabled class="block mt-1 w-full" type="text" name="email" value="{{$aluno->email}}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="dtnascimento" :value="__('Data de nascimento')" />
                            <x-text-input id="dtnascimento" disabled class="block mt-1 w-full" type="text" name="dtnascimento" value="{{$aluno->dtnascimento}}" required  />
                            <x-input-error :messages="$errors->get('dtnascimento')" class="mt-2" />
                        </div>
                        @can('access')
                            <x-danger-button class="mt-3">
                                {{ __('Delete') }}
                            </x-danger-button>
                        @endcan

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
