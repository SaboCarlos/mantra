<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <form wire:submit.prevent="destroyCategoria">
                    <div class="modal-body">
                        <h6>Você tem a certeza que quer eliminar essa categoria?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-md-12">
        
                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
                    
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Categoria
                            <a href="{{url('admin/categoria/criar')}}" class="btn btn-primary float-end">Adicionar Categoria</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Estado</td>
                                    <td>Acções</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categoria as $categoria )
                                    <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->nome}}</td>
                                        <td>{{$categoria->estado == '1' ? 'Desativado':'Visivel'}}</td>
                                        <td>
                                            <a href="{{ url('admin/categoria/'.$categoria->id.'/edit')}}" class="btn btn-success">Editar</a>
                                            <a href="#" wire:click="deleteCategoria({{$categoria->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                          
                        </div>
        
                    </div>
                </div>
        
            </div>
        </div>
    </div>  
</div>

@push('script')
    
    window.addEventListener('close-modal', event =>{
        $('#deleteModal').modal('hide');
    })

@endpush


