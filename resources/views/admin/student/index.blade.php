@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{ url('admin/students/create') }}" class="btn btn-primary m-b-5 m-r-2"><i class="nav-icon fa fa-user-plus"></i> &nbsp;register</a>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Full Name</th>
                      <th>Birth Date</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i = 1;
                    ?>
                    @forelse( $students as $student)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $student->full_name }}</td>
                      <td>{{ $student->birth_date }}</td>
                      <td>{{ $student->email }}</td>
                      <td>{{ $student->contact_number }}</td>
                      <td>
                        <a class="btn btn-warning" href="{{ route('admin.students.edit', $student->id) }}">edit</a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Student Data</td>
                    </tr>
                    @endforelse
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection