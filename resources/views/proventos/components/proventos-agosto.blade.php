<div class="accordion mb-5 mt-5" id="proventoAgosto">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                Agosto
            </button>
        </h2>
        <div id="collapseOne"
             class="accordion-collapse collapse
             {{ verificarMesAtualShow(\App\Models\Mes::AGOSTO) }}"
             aria-labelledby="headingOne"
             data-bs-parent="#proventoAgosto">
            <div class="accordion-body">
                <table class="table table-striped table-hover" id="tbl_proventos_agosto">
                    <thead>
                    <tr>
                        <th scope="col" class="d-none"></th>
                        <th scope="col">Valor</th>
                        <th scope="col">Mês</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($proventosAgosto as $provento)
                        <tr>
                            <td class="d-none">
                                {{ $provento->valor }}
                            </td>
                            <td>
                                <p class="text-success">
                                    {{ $provento->formatarParaDinheiro() }}
                                </p>
                            </td>
                            <td>
                                {{ $provento->mes->nome }}
                            </td>
                            <td>{{ $provento->user->name ?? '' }}</td>
                            <td>
                                @include('proventos.components.switch-icons')
                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                    <tr>
                        <td class="text-success">

                            Total : {{ \App\Service\DebitoService::returnTotalDebitoFormatado($proventosAgosto) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
