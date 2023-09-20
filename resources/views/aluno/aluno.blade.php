<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listar Alunos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200">Alunos</h2>
                    <table style="border: 1px solid rgb(211, 208, 193)">
                        <tr class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200" style="border: 1px solid rgb(211, 208, 193)">
                            <td>Nomes</td>
                            <td style="display:flex; justify-content:end;margin-right: 70px;">Opções</td>
                        </tr>
                        <ul class="mt-3 text-sm">
                            @if (isset($alunos))
                                @foreach ($alunos as $aluno)
                                    <tr style="border: 1px solid rgb(211, 208, 193)">
                                        <td>
                                        {{ $aluno->nome}}
                                        </td>
                                        <td>
                                        <x-secondary-button class="mt-3" style="margin-left: 900px;" >
                                            <a href="{{ route('aluno.edit', ['aluno' => $aluno->id])}}">
                                                {{ __('Editar') }}
                                            </a>
                                        </x-secondary-button>
                                        <a href="{{ route('aluno.show', ['aluno' => $aluno->id])}}">
                                            <x-danger-button class="mt-3">
                                                {{ __('show') }}
                                            </x-danger-button>
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </ul>
                    </table>

                    <form method="GET" action="{{route('aluno.lista')}}">
                        <x-primary-button class="mt-3">
                            {{ __('Listar') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
