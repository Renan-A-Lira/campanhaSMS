@extends('templates.bodyTemplate')

@section('content')
    
@overwrite


    <div id="lista">
        <img src="assets/images/lojas_pintos.png" />
        <div class="painel">
            <a href="/" class="btn btn-primary">
                <i class="fa-solid fa-file"> Novo</i>
            </a>

            <button onclick="Exportar()" class="btn btn-primary">
                <i class="fa-solid fa-file-csv"> Exportar</i>
            </button>

        </div>
        <table class="table table-striped table-sm" id="Tabela">
            <thead class="thead-dark">
                <tr>
                    <th>telefone-ddi</th>
                    <th>telefone-ddd</th>
                    <th>telefone-numero</th>
                    <th>nome</th>
                    <th>pedido</th>
                    <th>turno</th>
                    <th>data</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach ($response as $item)
                    <tr>
                        @foreach ($item as $key => $subitem)
                            <td>{{$subitem}}</td>
                        @endforeach

                    </tr>
                    @php
                        $count ++;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <div>Quantidade de SMS: {{ $count }}</div>
    </div>