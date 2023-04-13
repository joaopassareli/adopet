<x-layout title="Pets" :mensagem-sucesso="$successMessage">

    <a href="{{ route('pets.index') }}" class="btn btn-dark mb-2">
        Adicionar <i class="bi bi-plus-square"></i>
    </a>

    <ul class="list-group">

            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">

                <div class="d-flex alignt-items-center">
                    <table class="table table-striped table-hover mt-2">
                        <thead align="center">
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Raça</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Personalidade</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tutor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Foto</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)
                            <tr scope="row" align="center">
                                <td>{{ $pet->id }}</td>
                                <td>{{ $pet->name }}</td>
                                <td>{{ $pet->species }}</td>
                                <td>{{ $pet->size }}</td>
                                <td>{{ $pet->personality }}</td>
                                <td>{{ $pet->city }}</td>
                                <td>{{ $pet->state }}</td>
                                <td>{{ $pet->owner }}</td>
                                <td>{{ $pet->status }} desde {{ $pet->status_date }}</td>
                                <td>{{ $pet->profile_picture_url }}</td>
                                <td>
                                    <div class="botoes d-flex">
                                        <a href="{{ route('pets.index', $pet->id) }}" class="btn btn-info btn-sm ms-1" title="Editar Pet">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="post" title="Excluir Pet" onsubmit="confirm('Deseja mesmo remover o pet {{ $pet->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ms-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </li>
        </table>
    </ul>
</x-layout>
