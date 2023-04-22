<div class="accordion-item mt-3">
    <h2 class="accordion-header" id="headingDebitoMarco">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarco" aria-expanded="true" aria-controls="collapseMarco">
            Março
        </button>
    </h2>
    <div id="collapseMarco" class="accordion-collapse collapse" aria-labelledby="headingDebitoMarco" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table table-striped table-hover" id="tbl_debitos_marco">
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
                @forelse($debitosMarco as $debito)
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
                        Total : {{ \App\Service\DebitoService::returnTotalDebitoFormatado($debitosMarco) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
