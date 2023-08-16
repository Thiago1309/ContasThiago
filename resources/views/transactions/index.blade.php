@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lançamentos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lançamentos</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Novo Lançamento</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Data da Realização</th>
                                    <th>Data do Pagamento</th>
                                    <th>Situação</th>
                                    <th>Agência</th>
                                    <th>Conta</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->payment_form }}</td>
                                        <td>{{ $transaction->realization_date }}</td>
                                        <td>{{ $transaction->payment_date }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>a</td>
                                        <td>b</td>
                                        <td>{{ $transaction->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
