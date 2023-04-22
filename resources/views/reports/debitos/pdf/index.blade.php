<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Título Opcional</title>

    <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
    <link rel="stylesheet" href="{{ url('assets/site/css/certificate.css') }}">

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
<h1>Débitos</h1>
<table id="customers">
    <tr>
        <th>Débito</th>
        <th>Valor</th>
        <th>Usuário</th>
        <th>Mês</th>
        <th>Ano</th>
        <th>Cadastrado Em</th>
    </tr>
    @forelse($debitos as $debito)
        <tr>
            <td>{{ $debito->nome }}</td>
            <td>{{ $debito->formatarParaDinheiro() }}</td>
            <td>{{ $debito->user->name }}</td>
            <td>{{ $debito->mes->nome }}</td>
            <td>{{ $debito->ano }}</td>
            <td>{{ \App\Service\DataService::formatarData($debito->created_at) }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4"></td>
        </tr>
    @endforelse

</table>


</body>
</html>
