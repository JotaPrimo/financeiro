<div class="accordion-item mt-3">
    <h2 class="accordion-header" id="headingProventoJaneiro">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseJaneiro" aria-expanded="true" aria-controls="collapseJaneiro">
            Janeiro
        </button>
    </h2>
    <div id="collapseJaneiro" class="accordion-collapse collapse" aria-labelledby="headingProventoJaneiro" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table table-striped table-hover" id="tbl_proventos_janeiro">
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
                @forelse($proventosJaneiro as $provento)
                    <tr>
                        <td>
                            <p class="text-success">
                                {{ $provento->formatarParaDinheiro() }}

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
                        Total : {{ \App\Service\ProventoService::returnTotalProventoFormatado($proventosJaneiro) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
