@extends("layout.layout")

@section("content")

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Details</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personnes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td> <strong>Prénom et Nom </strong> </td>
                            <td>{{$one_people->first_name}} {{$one_people->last_name}}</td>
                        </tr>
                        <tr>
                            <td> <strong>Deuxièmes prénoms</strong> </td>
                            <td>{{$one_people->middle_names ?? "Non défini"}}</td>
                        </tr>
                        <tr>
                            <td> <strong>Nom de naissance</strong> </td>
                            <td>{{$one_people->birth_name}} </td>
                        </tr>
                        <tr>
                            <td> <strong>Date de naissance</strong> </td>
                            <td>{{$one_people->date_of_birth}} </td>
                        </tr>
                        <tr>
                            <td> <strong>Parents</strong> </td>
                            <td>
                                @forelse($one_people->parents as $one_people_parent)
                                    {{$one_people_parent->parent->first_name}} {{$one_people_parent->parent->last_name}} ;
                                @empty
                                    Vide
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <td> <strong>Enfants</strong> </td>
                            <td>
                                @forelse($one_people->childs as $one_people_child)
                                    {{$one_people_child->child->first_name}} {{$one_people_child->child->last_name}} ;
                                @empty
                                    Vide
                                @endforelse
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
