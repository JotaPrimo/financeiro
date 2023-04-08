<div class="accordion mb-5 mt-5" id="debitosMarco">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                Março
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show"
             aria-labelledby="headingOne"
             data-bs-parent="#debitosMarco">
            <div class="accordion-body">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Valor</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($debitosMarco as $debito)
                        <tr>
                            <td>{{ $debito->formatarParaDinheiro() }}</td>
                            <td>{{ $debito->user->name ?? '' }}</td>
                            <td>{{ $debito->categoria->nome ?? '' }}</td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                    <tr>
                        <td>
                            Total : {{ \App\Service\DebitoService::returnTotalDebitos($debitosMarco) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
