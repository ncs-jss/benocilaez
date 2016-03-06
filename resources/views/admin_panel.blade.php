<!DOCTYPE html>
<html>
@include('header')
<body>
    <style media="screen">

    .table :nth-child(1){
        width: 25%
    }
    .table :nth-child(2){
        width: 10%
    }
    .table :nth-child(3){
        width: 10%
    }
    .table :nth-child(4){
        width: 10%
    }
    .table :nth-child(5){
        width: 15%
    }
    .table :nth-child(6){
        width: 10%
    }
    .table :nth-child(7){
        width: 10%
    }
    .table :nth-child(8){
        width: 10%
    }

    </style>

<script type="text/javascript">
    $(document).ready(function(){
        $('.feature').click(function(){
            var what = $(this).attr('what');
            var button = $(this);
            button.html('WORKING...');
            a = ['ADD EVENTS', 'ADD WINNERS'];
            $.get('enable_feature/'+what, function(response){
                if(response == 1){
                    button.html('DISABLE ' + a[what]);
                    button.removeClass('btn-danger');
                    button.addClass('btn-success');
                    if(what == 1){
                        window.location.href = window.location.href
                    }
                }else if(response == 0){
                    button.html('ENABLE ' + a[what]);
                    button.removeClass('btn-success');
                    button.addClass('btn-danger');
                    if(what == 1){
                        window.location.href = window.location.href
                    }
                }else{
                    var x = button.hrml();
                    button.html('ERROR...TRY AGAIN...');
                    setTimeout(function(){
                        button.html(x);
                    }, 1000);
                }
            });
        });
    });
</script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if($add_events == 0)
                <button type="button" what='0' class="btn btn-danger feature">
                    ENABLE ADD EVENTS
                </button>
                @else
                <button type="button" what='0' class="btn btn-success feature">
                    DISABLE ADD EVENTS
                </button>
                @endif
                @if($add_winners == 0)
                <button type="button" id="feature" what='1' class="btn btn-danger feature">
                    ENABLE ADD WINNERS
                </button>
                @else
                <button type="button" id="feature" what='1' class="btn btn-success feature">
                    DISABLE ADD WINNERS
                </button>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>SOCIETY TABLE</h3>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr class="tableres">
                        <th>Society Name</th>
                        <th>#CTC</th>
                        <th>#Volunteer</th>
                        <th>#Coordinator</th>
                        <th>#Teacher</th>
                        <th>#Certi</th>
                        <th>View/Edit</th>
                        <th>Events</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btn btn-default button-chod">
                            View/Edit
                        </button></td>
                        <td><button type="button" class="btn btn-default button-chod">
                            View Events
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>
