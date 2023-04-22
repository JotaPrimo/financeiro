<div class="accordion-item mt-3">
    <h2 class="accordion-header" id="headingProventoMaio">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMaio" aria-expanded="true" aria-controls="collapseMaio">
            Maio
        </button>
    </h2>
    <div id="collapseMaio" class="accordion-collapse collapse {{ verificarMesAtualShow(\App\Models\Mes::MAIO) }}" aria-labelledby="headingProventoMaio" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table table-striped table-hover" id="tbl_proventos_abril">
                <thead>
                <tr>
                    <th scope="col">Valor</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Mês</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Cadastrado Em</th>
                </tr>
                </thead>
                <tbody>
                @forelse($proventosMaio as $provento)
                    <tr>
                        <td>
                            <p class="text-success">
                                {{ $provento->formatarParaDinheiro() }}
                                <span class="d-none"> {{ $provento->formatarParaDinheiro() }} </span>
                            </p>
                        </td>
                        <td>
                            {{ $provento->nome }}
                        </td>
                        <td>
                            {{ $provento->mes->nome }}
                        </td>
                        <td>{{ $provento->user->name ?? '' }}</td>
                        <td>
                            @include('proventos.components.switch-icons')
                        </td>
                        <td>
                            {{ \App\Service\DataService::formatarData($provento->created_at) }}
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
                <tr>
                    <td class="text-success">
                        Total : {{ \App\Service\ProventoService::returnTotalProventoFormatado($proventosMaio) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
