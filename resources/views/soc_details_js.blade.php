<script type="text/javascript">
    var Events = {};
    $(document).ready(function(){
        $.get('get_soc_events', function(res){
            Events = res;
            console.log(res);
        });
        
        $('.add').click(function(){
            var which = $(this);
            var group = $(this).attr('arg');
            inflate_tablerow(group);
            $('.phone').attr('onkeypress', 'return event.charCode >= 48 && event.charCode <= 57');
        });

        $(document).on('click', '.save-det', function(){
            var me = $(this);
            var parent = $(this).parent().parent();
            var inputs = [];
            var type = parent.parent().parent().attr('type');
            var branch_yr = parent.find('.branch').val()+'-'+
                            parent.find('.year').val();
            $(parent).find('input').each(function(){
                inputs.push($(this).val());
            });
            var data = {name: inputs[0],
                        rollno: inputs[1],
                        phone: inputs[2],
                        branch_yr: branch_yr,
                        events: '',
                        type: type,}
            $.get('save_mem_details', data, function(res){
                if(res.status == 1){
                    me.html("Edit");
                    me.removeClass('save-det');
                    me.addClass('edit-det');
                    convert_to_p(me.parent(), data, res.id);
                }else{
                    me.html('Error');
                    setTimeout(function(){
                        me.html('Try Again');
                    }, 1000);
                }
            });
        });

        $(document).on('click', '.del-det', function(){
            console.log('del-det');
            var tr = $(this).parent().parent();
            var id = tr.attr('id');
            var me = $(this);
            if(id != undefined){
                $.get('del-det/'+ id, function(res){
                    if(res.status == 1){
                        tr.html('');
                    }else{
                        me.html('Error');
                        setTimeout(function(){
                            me.html('Try Agn');
                        }, 1000);
                    }
                });
            }
        });

        $(document).on('click', '.cancel', function(){
            var me = $(this);
            var parent = $(this).parent().parent();
            var inputs = [];
            var type = parent.parent().parent().attr('type');
            var branch_yr = parent.find('.branch').val()+'-'+
                            parent.find('.year').val();
            $(parent).find('input').each(function(){
                inputs.push($(this).val());
            });
            var data = {name: inputs[0],
                        rollno: inputs[1],
                        phone: inputs[2],
                        branch_yr: branch_yr,
                        events: '',
                        type: type,}
            convert_to_p(me.parent(), data, parent.attr('id'));
            var cancel = parent.find('.cancel');
            cancel.addClass('del-det');
            cancel.removeClass('cancel');
            cancel.html('Delete');
            var save = parent.find('update-det');
            save.addClass('save-det');
            save.removeClass('update-det');
        });

        $(document).on('click', '.edit-det', function(){

            var me = $(this);
            var parent = $(this).parent().parent();
            var inputs = [];
            var type = parent.parent().parent().attr('type');
            parent.find('td').each(function(){
                inputs.push($(this).html());
            });
            var data = {name: inputs[0],
                        rollno: inputs[2],
                        phone: inputs[3],
                        branch_yr: inputs[1],
                        events: inputs[4],
                        type: type,
                    };

            console.log(data);
            var row = row_generator();
            parent.html(row.substring(4, row.length - 4));
            console.log(parent.find('.name'));

            parent.find('.name').val(data.name);
            parent.find('.rollno').val(data.rollno);
            parent.find('.phone').val(data.phone);
            parent.find('.events').val(data.events);
            var br = data.branch_yr.substring(0, data.branch_yr.length -2);
            var yr = data.branch_yr.substring(data.branch_yr.length -1);
            parent.find('.branch').val(br);
            parent.find('.year').val(yr);


            var cancel = parent.find('.del-det');
            var update = parent.find('.save-det');

            update.removeClass('save-det');
            update.addClass('update-det');
            cancel.html('Cancel');
            cancel.removeClass('del-det');
            cancel.addClass('cancel');


        });

        $(document).on('click', '.update-det', function(){
            var me = $(this);
            var parent = $(this).parent().parent();
            var inputs = [];
            var type = parent.parent().parent().attr('type');
            var branch_yr = parent.find('.branch').val()+'-'+
                            parent.find('.year').val();
            $(parent).find('input').each(function(){
                inputs.push($(this).val());
            });
            var id = parent.attr('id');
            var data = {name: inputs[0],
                        rollno: inputs[1],
                        phone: inputs[2],
                        branch_yr: branch_yr,
                        events: '',
                        type: type,}
            $.get('update_mem_details/'+id, data, function(res){
                if(res.status == 1){
                    me.html("Edit");
                    me.removeClass('update-det');
                    me.addClass('edit-det');
                    convert_to_p(me.parent(), data, res.id);
                }else{
                    me.html('Error');
                    setTimeout(function(){
                        me.html('Try Again');
                    }, 1000);
                }
            });
        });

        function convert_to_p(td, data, id){
            var button = td.html();
            var tr = td.parent();
            tr.attr('id', id);
            tr.html('');
            var str = '<td>'+data.name+'</td>';
            str += '<td>'+data.branch_yr+'</td>';
            str += '<td>'+data.rollno+'</td>';
            str += '<td>'+data.phone+'</td>';
            str += '<td>'+data.events.toString()+'</td>';
            str += '<td>'+button+'</td>';
            tr.html(str);
        }

        function inflate_tablerow(id){
            $('#table'+id+' tbody').append(row_generator());
        }

        function row_generator(){
            var str = '<tr>';
            for(var i = 0; i < 6; i++){
                switch(i){
                    case 0: str += '<td>'
                            str += simple_text('Enter Name', 'name', 50);
                            str += '</td>'
                            break;
                    case 1: str += '<td>'
                            str += opt_branches() +" ";
                            str += opt_year();
                            str += '</td>'
                            break;
                    case 2: str += '<td>'
                            str += simple_text('Roll Number', 'rollno', 10);
                            str += '</td>'
                            break;
                    case 3: str += '<td>'
                            str += simple_text('Pnone no.', 'phone', 10);
                            str += '</td>'
                            break;
                    case 4: str += '<td>'
                            str += opt_events();
                            str += '</td>'
                            break;
                    case 5: str += '<td>'
                            str += save_button();
                            str += '</td>'
                            break;
                    default: return;

                }
            }
            return str + "</tr>";
        }

        function opt_branches(){
            var br = ['-', 'CS', 'EC', 'CE', 'ME', 'EE', 'EEE',
                      'IT', 'IC', 'MT'];
            var str = '<select class="unblock branch form-control">';
            for (var i = 0; i < br.length; i++) {
                str += '<option value=' + br[i] + '>';
                str += br[i];
                str += '</option>';
            }
            return str + '</select>';
        }

        function opt_year(){
            var str = '<select class="unblock year form-control">';
            for (var i = 1; i < 5; i++) {
                str += '<option value=' + i + '>';
                str += i;
                str += '</option>';
            }
            return str + '</select>';
        }

        function opt_events(){

            return simple_text("abhay", 'events', 1000);
        }

        function simple_text(placeholder, class_name, maxlen){
            return '<input type="text" name="phno" placeholder="'+
            placeholder + '" class = "form-control button-chod ' +
            class_name + '" maxlength='+ maxlen +'/>';
        }

        function save_button(){
            return '<button type="button" class="save-det'+
            ' btn btn-default unblock button-chod'+
            '">Save</button>'+
            '<button type="button" class="del-det'+
            ' btn btn-danger unblock button-chod'+
            '">Delete</button>'
        }
    });
</script>
