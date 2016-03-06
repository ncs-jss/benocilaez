<!DOCTYPE html>
<html>
    <body>
        <div class="row">
            <div class="col-md-2">
                <h3 class="margin-hatao">Core Team</h3>
            </div>
            <div class="col-md-offset-8 col-md-4">
                <button type="button" class="btn btn-default add" arg="1">
                    ADD
                </button>
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <table class="table" type='1' id="table1">
                    <thead>
                        <tr class="tableres">
                            <th>CTC Name</th>
                            <th>Branch/Year</th>
                            <th>Roll no.</th>
                            <th>Ph.no.</th>
                            <th>Event</th>
                            <th>Edit/ Save</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $mem)
                        @if($mem['type'] == 1)
                        <tr id="{{ $mem['id'] }}">
                            <td>{{ $mem['name'] }}</td>
                            <td>{{ $mem['branch_yr'] }}</td>
                            <td>{{ $mem['roll_num'] }}</td>
                            <td>{{ $mem['phone'] }}</td>
                            <td>{{ $mem['events'] }}</td>
                            <th><button type="button" class="edit-det btn btn-default unblock button-chod">
                                Edit
                            </button>
                            <button type="button" class="del-det btn btn-danger unblock button-chod">
                                Delete
                            </button>
                        </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h3 class="margin-hatao">Coordinators</h3>
            </div>
            <div class="col-md-offset-8 col-md-4">
                <button type="button" class="btn btn-default add" arg="2">
                    ADD
                </button>
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <table class="table" type='2' id="table2">
                    <thead>
                        <tr class="tableres">
                            <th>Coordinator Name</th>
                            <th>Branch/Year</th>
                            <th>Roll no.</th>
                            <th>Ph.no.</th>
                            <th>Event</th>
                            <th>Edit/ Save</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $mem)
                        @if($mem['type'] == 2)
                        <tr id="{{ $mem['id'] }}">
                            <td>{{ $mem['name'] }}</td>
                            <td>{{ $mem['branch_yr'] }}</td>
                            <td>{{ $mem['roll_num'] }}</td>
                            <td>{{ $mem['phone'] }}</td>
                            <td>{{ $mem['events'] }}</td>
                            <th><button type="button" class="edit-det btn btn-default unblock button-chod">
                                Edit
                            </button>
                            <button type="button" class="del-det btn btn-danger unblock button-chod">
                                Delete
                            </button>
                        </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h3 class="margin-hatao">Volunteers</h3>
            </div>
            <div class="col-md-offset-8 col-md-4">
                <button type="button" class="btn btn-default add" arg="3">
                    ADD
                </button>
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <table class="table" type='3' id="table3">
                    <thead>
                        <tr class="tableres">
                            <th>Volunteer Name</th>
                            <th>Branch/Year</th>
                            <th>Roll no.</th>
                            <th>Ph.no.</th>
                            <th>Event</th>
                            <th>Edit/ Save</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $mem)
                        @if($mem['type'] == 3)
                        <tr id="{{ $mem['id'] }}">
                            <td>{{ $mem['name'] }}</td>
                            <td>{{ $mem['branch_yr'] }}</td>
                            <td>{{ $mem['roll_num'] }}</td>
                            <td>{{ $mem['phone'] }}</td>
                            <td>{{ $mem['events'] }}</td>
                            <th><button type="button" class="edit-det btn btn-default unblock button-chod">
                                Edit
                            </button>
                            <button type="button" class="del-det btn btn-danger unblock button-chod">
                                Delete
                            </button>
                        </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
