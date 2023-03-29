@extends('...templates.bodyTemplate')

@section('content')
    <div class="container">

        <div class="modal fade" tabindex="-1" role="dialog" id="loading" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="modal-loading">
                    <div class="modal-header align-items-center justify-content-center flex-column">
                        <h3 class="modal-title font-weight-bold">Grupo PINTOS</h3>
                <h6 class="font-italic">Gerar Dados de Status para Entrega</h6>		
                    </div>
                    <form method="POST" action="/">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Data Entrega</label>
                                </div>
                                <input name="dataEntrega" type="date" class="form-control" aria-label="carga">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect02">Carga</label>
                                </div>
                                <input name="carga" type="number" class="form-control" placeholder="digite o codigo carga" aria-label="carga">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect03">Turno Entrega</label>
                                </div>
                                <select class="custom-select" id="turno" name="turno">
                                    <option value="0" selected="selected">Todos</option>
                                    <option value="1">Manha</option>
                                    <option value="2">Tarde</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info"  value="Gerar!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@overwrite