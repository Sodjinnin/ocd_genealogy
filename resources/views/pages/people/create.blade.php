@extends("layout.layout")

@section("content")

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajout</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajout</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{route('people.store')}}" method="post" class="row">
                @csrf
                @include("layout.messages")
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               name="first_name"
                               placeholder="Prénom">
                    </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                           name="last_name"
                           placeholder="Nom">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                           name="middle_names"
                           placeholder="Deuxièmes prénoms">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                           name="birth_name"
                           placeholder="Nom de naissance">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control form-control-user"
                           name="date_of_birth"
                           placeholder="Date de naissance">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Enregistrer
                </button>

            </form>

        </div>
    </div>


@endsection
