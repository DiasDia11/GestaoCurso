<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @foreach ($curso->unique('curso_id') as $c)
               {{ $titulo[$c->curso_id] }}
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200">Matriculados</h2>
                    <table style="border: 1px solid rgb(211, 208, 193); padding-right: 900px">
                        <tr class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200" style="border: 1px solid rgb(211, 208, 193)">
                            <td>Nomes</td>
                            <td style="display: flex; justify-content: end">ID</td>
                        </tr>
                        @if (isset($curso))

                            <ul class="mt-3 text-sm">
                                @foreach ($curso as $c)
                                    <tr style="border: 1px solid rgb(211, 208, 193)">
                                        <td>
                                            {{ $nomesDosAlunos[$c->aluno_id] }}
                                        </td>
                                        <td>
                                            <div style="margin-left: 900px">
                                                {{$c->id}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </ul>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
