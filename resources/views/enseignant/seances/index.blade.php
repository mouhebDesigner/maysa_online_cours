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
                            <h1 class="m-0">Liste de séances</h1>
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
                                                    <label>
                                                        Search:
                                                        <input 
                                                        type="search" class="form-control form-control-sm" 
                                                        placeholder="" 
                                                        aria-controls="example1">
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            classe
                                                        </th>
                                                        <th>
                                                            jours
                                                        </th>
                                                        <th>
                                                            temps début
                                                        </th>
                                                        <th>
                                                            temps fin
                                                        </th>
                                                      
                                                        <th>
                                                            matiere
                                                        </th>
                                                        
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach($seances as $seance)
                                                        <tr>
                                                        
                                                            <td>{{ $seance->classe->nom }}</td>
                                                            <td>{{ $seance->jours }}</td>
                                                            <td>{{ $seance->temps_debut }}</td>
                                                            <td>{{ $seance->temps_fin }}</td>
                                                            <td>{{ $seance->matiere->titre }}</td>
                                                            <td>{{ $seance->created_at }}</td>
                                                            <td>{{ $seance->updated_at }}</td>
                                                            <td>
                                                               <a href="{{ url('enseignant/seance/'.$seance->id.'/registre') }}" class="btn btn-primary">
                                                                    Registre d'appel
                                                               </a>
                                                               @if($seance->presence != 1)

                                                                <a href="{{ url('enseignant/seance/'.$seance->id.'/pointage') }}" class="btn btn-primary">
                                                                        Pointage
                                                                </a>
                                                               @else 

                                                                <button disabled href="{{ url('enseignant/seance/'.$seance->id.'/pointage') }}" class="btn btn-primary">
                                                                        Pointage <i class="fa fa-check"></i>
                                                                </button>
                                                               @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            classe
                                                        </th>
                                                        <th>
                                                            jours
                                                        </th>
                                                        <th>
                                                            temps début
                                                        </th>
                                                        <th>
                                                            temps fin
                                                        </th>
                                                       
                                                        <th>
                                                            matiere
                                                        </th>
                                                        
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>

                                                    </tr>
                                                </tfoot>
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
