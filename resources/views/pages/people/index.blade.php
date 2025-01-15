@extends("layout.layout")

@section("content")

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Personnes</h1>
        <a href="{{route("people.create")}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personnes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Prénom et Nom </th>
                        <th>Deuxièmes prénoms</th>
                        <th>Nom de naissance</th>
                        <th>Date de naissance</th>
                        <th>Créer par</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Prénom et Nom </th>
                        <th>Deuxièmes prénoms</th>
                        <th>Nom de naissance</th>
                        <th>Date de naissance</th>
                        <th>Créer par</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($people as $item)
                    <tr>
                        <td>{{$item->first_name}} {{$item->last_name}} </td>
                        <td>{{$item->middle_names ?? "Non défini"}}</td>
                        <td>{{$item->birth_name}}</td>
                        <td>{{$item->date_of_birth}}</td>
                        <td>{{$item->creator->name}}</td>
                        <td><a href="{{route("people.show",[$item->id])}}">Consulter</a> </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
