<div>
    @include('components.menu')
    <div class="container mx-auto">
        <h2>Pacientes</h2>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border border-gray-400 px-4 py-2 text-left">Nome</th>
                    <th class="border border-gray-400 px-4 py-2 text-left">Data Nascimento</th>
                    <th class="border border-gray-400 px-4 py-2 text-left">Data Atendimento</th>
                    <th class="border border-gray-400 px-4 py-2 text-left">Convênio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <td class="border px-4 py-2">Intro to CSS</td>
                        <td class="border px-4 py-2">Adam</td>
                        <td class="border px-4 py-2">858</td>
                        <td class="border px-4 py-2">858</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>