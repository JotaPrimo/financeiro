<div class="accordion-item mt-3">
    <h2 class="accordion-header" id="headingDebitoJaneiro">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseJaneiro" aria-expanded="true" aria-controls="collapseJaneiro">
            Janeiro
        </button>
    </h2>
    <div id="collapseJaneiro" class="accordion-collapse collapse" aria-labelledby="headingDebitoJaneiro" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table table-striped table-hover" id="tbl_debitos_janeiro">
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
                @forelse($debitosJaneiro as $debito)
                    <tr>
                        <td>
                            <p class="text-danger">
                                {{ $debito->formatarParaDinheiro() }}
                                <span class="d-none"> {{ $debito->formatarParaDinheiro() }} </span>
                            </p>
                        </td>
                        <td>
                            {{ $debito->nome }}
                        </td>
                        <td>
                            {{ $debito->mes->nome }}
                        </td>
                        <td>{{ $debito->user->name ?? '' }}</td>
                        <td>
                            @include('debitos.components.switch-icons')
                        </td>
                        <td>
                            {{ \App\Service\DataService::formatarData($debito->created_at) }}
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
                <tr>
                    <td class="text-danger">
                        Total : {{ \App\Service\DebitoService::returnTotalDebitoFormatado($debitosJaneiro) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
