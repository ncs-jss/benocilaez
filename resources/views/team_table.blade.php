<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                @if($type == 1)
                Core Team
                @elseif($type == 2)
                Coordinators
                @elseif($type == 3)
                Volunteers
                @else($type == 4)
                Teacher Coordinators
                @endif
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Member Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="form1" action="" method="get">
                                            <div class="form-group">
                                                <label>Member Name</label>
                                                <input type="text" name="name" placeholder="Member Name" class="form-control name" required>
                                            </div>
                                            @if($type == 1)
                                            <div class="form-group">
                                                <label>Member email</label>
                                                <input type="email" name="email" placeholder="E-mail" class="form-control email" required>
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <label>Events <em>Press ctrl to select multiple</em></label>
                                                <select class="events form-control events" name="events" multiple>

                                                </select>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Member Contact Number</label>
                                                <input type="tel" name="phone" placeholder="Phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Branch/ Course</label>
                                                <select name ="branch" class="branch form-control">
                                                    <option value="-">-</option>
                                                    <option value="CS">CS</option>
                                                    <option value="EC">EC</option>
                                                    <option value="CE">CE</option>
                                                    <option value="ME">ME</option>
                                                    <option value="EE">EE</option>
                                                    <option value="EEE">EEE</option>
                                                    <option value="IT">IT</option>
                                                    <option value="IC">IC</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MCA">MCA</option>
                                                    <option value="MBA">MBA</option>
                                                    <option value="MTECH">MTECH</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Year</label>
                                                <select name = "year" class="year form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" id="go" for='form1' class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body" id="include-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Member Name</th>
                                            <th>Phone no.</th>
                                            @if($type == 1)
                                            <th>Email</th>
                                            @else
                                            <th>Events</th>
                                            @endif
                                            <th>Branch/Yr</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $members as $mem)
                                        <tr>
                                            <td>{{ $mem['name'] }}</td>
                                            <td>{{ $mem['phone'] }}</td>
                                            @if($type == 1)
                                            <td>{{ $mem['email'] }}</td>
                                            @else
                                            <td>{{ $mem['events'] }}</td>
                                            @endif
                                            <td>{{ $mem['branch_yr'] }}</td>
                                            <td><a class="btn btn-default btn-xs"
                                                val="{!! $mem['id'] !!}"
                                                role="edit_button">
                                                Edit</a>
                                            </td>
                                            <td><a class="btn btn-danger btn-xs"
                                                val="{!! $mem['id'] !!}"
                                                role="del_button">
                                                Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-default" id="add">Add Member</button>

                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->

                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>

            </div>

        </div>
    </div>


</div>
