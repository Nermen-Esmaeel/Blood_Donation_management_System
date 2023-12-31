@extends('frontend.layouts.master')

@section('content')

<!-- Main content -->

<div class="row">
    <div class="col-9">
        <div class="card mt-4" style="margin-left:25%">



            <div class="card">
                <div class="card-header" style="background-color:rgb(236, 172, 9)">
                    <h3 class=" card-title">My Donation Requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doner Name</th>
                                <th scope="col">Units</th>
                                <th scope="col">Last Donation</th>
                                <th scope="col">Feedback</th>
                                <th scope="col">Diseases</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ( $myDonations as $myDonation)
                            <tr>

                                <th scope="row">{{ $i++}}</th>
                                <td>{{ $myDonation->user->userName }}</td>
                                <td align="center">{{ $myDonation->Unit }}</td>
                                <td>{{ $myDonation->last_date }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">{{ $myDonation->feedback }}</td>
                                @if($myDonation->diseases == '1')
                                <td align="center">Yes</td>
                                @else
                                <td align="center">No</td>
                                @endif
                                <td>{{ $myDonation->status }}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


@endsection
