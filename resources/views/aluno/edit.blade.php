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
                    <h1>Editar aluno</h2>
                    <form method="POST" action="{{route('aluno.update',['aluno' => $aluno->id])}}">
                        @csrf
                        <input type="hidden" name="__method" value="PUT">
                        <input type="text" name="nome" value="{{ $aluno->nome}}">
                        <input type="text" name="email" value="{{ $aluno->email}}">
                        <input type="text" name="dtnascimento" value="{{ $aluno->dtnascimento}}">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
