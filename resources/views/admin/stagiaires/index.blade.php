@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste des stagiaires</h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row">
                        <div class="col-12">
                            
                            <!-- /.card -->

                            <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between">
                                                <div id="example1_filter" class="dataTables_filter">
                                                   
                                                </div>
                                                @if(Auth::user()->grade == "admin")
                                                <a href="{{ url('admin/stagiaires/create') }}">
                                                    <button class="btn-icon">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            nom
                                                        </th>
                                                        <th>
                                                            pr??nom
                                                        </th>
                                                        <th>
                                                            email
                                                        </th>
                                                        <th>
                                                            niveau
                                                        </th>
                                                        <th>
                                                            formation
                                                        </th>
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        @if(Auth::user()->grade == "admin")
                                                        <th>
                                                            Actions
                                                        </th>
                                                        @endif
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach($stagiaires as $stagiaire)
                                                        <tr>
                                                            <td>{{ $stagiaire->nom }}</td>
                                                            <td>{{ $stagiaire->prenom }}</td>
                                                            <td>{{ $stagiaire->email }}</td>
                                                            <td>{{ $stagiaire->stagiaire->niveau }}</td>
                                                            <td>{{ $stagiaire->stagiaire->type_formation }}</td>
                                                            <td>{{ $stagiaire->created_at }}</td>
                                                            <td>{{ $stagiaire->updated_at }}</td>
                                                            @if(Auth::user()->grade == "admin")

                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <form action="{{ url('admin/stagiaires/'.$stagiaire->id) }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce stagiaire')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                        <a href="{{ url('admin/stagiaires/'.$stagiaire->id.'/edit') }}" onclick="return confirm('Voules-vous modifier ce stagiaire')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                              
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
