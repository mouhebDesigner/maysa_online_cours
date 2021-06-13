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
                            <h1 class="m-0">Registre d'appel</h1>
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
                                                            nom
                                                        </th>
                                                        <th>
                                                            prénom
                                                        </th>
                                                        <th>
                                                            Etat
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($stagiaires as $stagiaire)
                                                        <tr>
                                                            <td>{{ $stagiaire->user->nom }}</td>
                                                            <td>{{ $stagiaire->user->prenom }}</td>
                                                            @php
                                                                $stagiaire_id = $stagiaire->id;
                                                                $registre = App\Models\Registre::where('stagiaire_id', $stagiaire->id)->where('seance_id', $seance_id);
                                                            @endphp
                                                            <td id="column_{{ $stagiaire->id }}">

                                                                @if($registre->count() > 0)
                                                                    @if($registre->first()->etat == 'present')
                                                                        <p> Présent </p>
                                                                    @else 
                                                                        <p> Absent </p>
                                                                    @endif
                                                                @else 
                                                                    <a 
                                                                        href="{{ url('enseignant/absences/'.$stagiaire->id.'/'.$seance_id) }}" 
                                                                        id="absent"  
                                                                        onclick="return confirm('Ce stagiaire va enregistrer comme absent');"
                                                                        class="btn btn-primary">Absent</a>
                                                                    <a href="{{ url('enseignant/presences/'.$stagiaire->id.'/'.$seance_id) }}" class="btn btn-primary">Présent</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            nom
                                                        </th>
                                                        <th>
                                                            prénom
                                                        </th>
                                                        
                                                        <th>
                                                            Etat
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
