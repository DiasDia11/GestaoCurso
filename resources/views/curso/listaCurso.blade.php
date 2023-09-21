<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listar Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200">Cursos</h2>
                        <table style="border: 1px solid rgb(211, 208, 193)">
                            <tr class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200" style="border: 1px solid rgb(211, 208, 193)">
                                <td>Titulos</td>
                                <td style="display:flex; justify-content:end;margin-right: 70px;">Opções</td>
                            </tr>
                            <ul class="mt-3 text-sm">
                                    @foreach ($cursos as $curso)
                                        <tr style="border: 1px solid rgb(211, 208, 193)">
                                            <td>
                                            {{ $curso->titulo}}
                                            </td>
                                            <td>
                                            <a href="{{ route('curso.edit', ['curso' => $curso->id])}}">
                                                <x-secondary-button class="mt-3" style="margin-left: 800px;">
                                                    {{ __('Editar') }}
                                                </x-secondary-button>
                                            </a>
                                            <a href="{{ route('curso.alunos', ['curso' => $curso->id])}}">
                                                <x-danger-button class="mt-3">
                                                    {{ __('View') }}
                                                </x-danger-button>
                                            </a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </ul>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
