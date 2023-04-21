<div class="accordion mb-5 mt-5" id="proventosJaneiro">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                Janeiro
            </button>
        </h2>
        <div
            id="collapseOne"
            class="accordion-collapse collapse
            {{ verificarMesAtualShow(\App\Models\Mes::JANEIRO) }}"
            aria-labelledby="headingOne"
            data-bs-parent="#proventosJaneiro">
            <div class="accordion-body">
                <table class="table table-striped table-hover" id="tbl_proventos_janeiro">
                    <thead>
                    <tr>
                        <th scope="col">Valor</th>
                        <th scope="col">Mês</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cadastrado Em</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($proventosJaneiro as $provento)
                        <tr>
                            <td>
                                <p class="text-success">
                                    {{ $provento->formatarParaDinheiro() }}
                                </p>
                            </td>
                            <td>
                                {{ $provento->mes->nome }}
                            </td>
                            <td>
                                @include('components.badge-ano')
                            </td>
                            <td>
                                {{ $provento->user->name ?? '' }}
                            </td>
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
                            Total : {{ \App\Service\DebitoService::returnTotalDebitoFormatado($proventosJaneiro) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
