@extends('layouts.author.layout')

@section('title','Category Management')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                >
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                    
                                    <th> Summary </th>
                                    <th> Content </th>
                                    <th> Image</th>

                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($author as $au)
                                <tr>

                                    <td> {{$au->id }} </td>
                                    
                                    <td> {{ $au->summary }} </td>
                                    <td> {{ $au->content }} </td>
                                    <td> <img style="width: 50px; height: auto;" src="{{ asset('/storage/'.$au->image) }}" /> </td>
                                    
                                    <td> 
                                        <a class="btn btn-primary" href="{{ route('author_edit', ['id' => $au->id]) }}"> <i class="fa fa-edit">  </i> </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('author_delete',['id'=> $au->id ]) }}" >
                                            @csrf
                                        <div class="modal fade" id="delete_author_{{ $au->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure delete the category named {{ $au->summary }} ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_author_{{ $au->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#user_manager').DataTable();
        });
    </script>
@endsection