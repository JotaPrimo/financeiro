<div class="accordion mb-5 mt-5" id="debitosOutubro">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                Outubro
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show"
             aria-labelledby="headingOne"
             data-bs-parent="#debitosOutubro">
            <div class="accordion-body">
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Valor</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Mês</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($debitosOutubro as $debito)
                        <tr>
                            <td>
                                <p class="text-danger">
                                    {{ $debito->formatarParaDinheiro() }}
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
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                    <tr>
                        <td>
                            Total : {{ \App\Service\DebitoService::returnTotalDebitoFormatado($debitosOutubro) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
