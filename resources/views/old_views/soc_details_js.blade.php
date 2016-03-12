<script type="text/javascript">

$(document).ready(function(){
    var Events;
    $.get('xx', function(res){
        Events = res;
    });
    var initial = {name:'',
    branch:'',
    yr:'',
    phone:'',
    events:'',
    email:''};

    var add = 0;

    $(document).on('click', '.add', function(){
        add = 1;
        var which = $(this);
        var group = $(this).attr('arg');
        inflate_tablerow(group);
        $('.phone').attr('onkeypress', 'return event.charCode >= 48 && event.charCode <= 57');
        $('.events').find('button').css('width', '100% !important');
        $('.events').multiselect({
            buttonClass: 'btn btn-default button-chod',
            buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'No Event Selected';
                }
                else{
                    return options.length+' Events';
                }
            }
        });
    });

    $(document).on('click', '.save-det', function(){

        var me = $(this);
        var parent = $(this).parent().parent();
        var inputs = [];
        var type = parent.parent().parent().attr('type');
        var yr = (parent.find('.year').val())? parent.find('.year').val() : '-';
        var branch_yr = parent.find('.branch').val()+' '+
        yr;
        var events = (parent.find('.events').val()) ? parent.find('.events').val() : [];
        var events_name = get_event_names(parent, events);
        var email = parent.find('.email').val();
        if(!email){
            email = '';
        }
        var end = 0;
        $(parent).find('input').each(function(){
            if($(this).val() == ''){
                $(this).focus();
                end = 1;
            }
            inputs.push($(this).val());
        });

        if(end == 1){
            return;
        }

        if(inputs[0] == ''){
            $(parent).find('input .name').focus();
            return;
        }

        var data = {name: inputs[0],
            rollno: "",
            phone: inputs[1],
            branch_yr: branch_yr,
            events: events.toString(),
            type: type,
            events_name: events_name,
            email: email,
        }

        if(type == 4){
            data = {
                name : inputs[0],
                phone : inputs[1],
                type : type,
                rollno : '',
                branch_yr : '',
                events : '',
                events_name: '',
                email :''
            };
        }

        console.log();
        if((!validate_email(data.email) || !validate_phno(data.phone)) &&
        type == 1){
            if(!validate_email(data.email))
            alert('Enter Valid email');
            if(!validate_phno(data.phone))
            alert('Enter Valid Phone Number');
        }else{
            $.get('save_mem_details', data, function(res){
                if(res.status == 1){
                    add = 0;
                    me.html("Edit");
                    me.removeClass('save-det');
                    me.addClass('edit-det');

                    var del = me.parent().find('.cancel');
                    del.html('Delete');
                    del.addClass('del-det');
                    del.removeClass('cancel');
                    convert_to_p(me.parent(), data, res.id);
                }else{
                    me.html('Error');
                    setTimeout(function(){
                        me.html('Try Again');
                    }, 1000);
                }
            });
        }
    });

    $(document).on('click', '.del-det', function(){
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
        var yr = (parent.find('.year').val())? parent.find('.year').val() : '-';
        var branch_yr = parent.find('.branch').val()+' '+
        yr;
        $(parent).find('input').each(function(){
            inputs.push($(this).val());
        });
        var data = {name: initial.name,
            rollno: '',
            phone: initial.phone,
            branch_yr: initial.branch,
            events: initial.events,
            type: type,
            email: initial.email,
        }
        if(type == 4){
            data = {
                name : inputs[0],
                phone : inputs[1],
                type : type,
                rollno : '',
                branch_yr : '',
                events : '',
                email: "",
            }
        }

        if(parent.attr('id')){
            if(type != 4){
                convert_to_p(me.parent(), data, parent.attr('id'));
            }else{
                convert_to_p_t(me.parent(), data, parent.attr('id'));
            }
            var cancel = parent.find('.cancel');
            cancel.addClass('del-det');
            cancel.removeClass('cancel');
            cancel.html('Delete');
            var save = parent.find('.update-det');
            save.addClass('edit-det');
            save.removeClass('update-det');
            save.html('Edit');
        }else{
            parent.remove();
        }
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
            rollno:'',
            phone: inputs[2],
            branch_yr: inputs[1],
            events: inputs[3],
            type: type,
            email: inputs[3],
        };

        initial.name = inputs[0];
        initial.phone = inputs[2];


        if(type == 4){
            data = {
                name : inputs[0],
                phone : inputs[1],
                type : type,
                rollno : '',
                branch_yr : '',
                events : '',
                email: '',
            }
        }

        if(type != 4){
            initial.branch = inputs[1];
            initial.events = inputs[3];
            initial.email = inputs[4];
        }

        var row;
        if(type == 4){
            row = teach_row_gen();
        }else{
            row = row_generator(type);
        }
        parent.html(row.substring(4, row.length - 4));

        parent.find('.name').val(data.name);
        parent.find('.phone').val(data.phone);
        parent.find('.email').val(data.email);

        if(type != 4){

            parent.find('.rollno').val(data.rollno);
            parent.find('.events').val(data.events);

            var br = data.branch_yr.split(' ')[0];
            var yr = data.branch_yr.split(' ')[1];

            parent.find('.branch').val(br);
            parent.find('.year').val(yr);
        }


        var cancel = parent.find('.del-det');
        var update = parent.find('.save-det');

        update.removeClass('save-det');
        update.addClass('update-det');
        cancel.html('Cancel');
        cancel.removeClass('del-det');
        cancel.addClass('cancel');

        $('.events').find('button').css('width', '100% !important');

        $('.events').multiselect({
            buttonClass: 'btn btn-default button-chod',
            buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'No Event Selected';
                }
                else{
                    return options.length+' Events';
                }
            }
        });

    });

    $(document).on('click', '.update-det', function(){
        var me = $(this);
        var parent = $(this).parent().parent();
        var inputs = [];
        var type = parent.parent().parent().attr('type');
        var yr = (parent.find('.year').val())? parent.find('.year').val() : '-';
        var branch_yr = parent.find('.branch').val()+' '+
        yr;
        var events = (parent.find('.events').val()) ? parent.find('.events').val() : [];
        var events_name = get_event_names(parent, events);
        var email = parent.find('.email').val();

        if(!email){
            email = ''
        }


        var end = 0;
        $(parent).find('input').each(function(){
            if($(this).val() == ''){
                $(this).focus();
                end = 1;
            }
            inputs.push($(this).val());
        });

        if(end == 1){
            return;
        }
        var id = parent.attr('id');

        var data = {name: inputs[0],
            rollno: '',
            phone: inputs[1],
            branch_yr: branch_yr,
            events: events.toString(),
            type: type,
            events_name: events_name.toString(),
            email: email,
        }
        if(type == 4){
            if(!id)
            id = 'teach';
            data = {
                name : inputs[0],
                phone : inputs[1],
                type : type,
                rollno : '',
                branch_yr : '',
                events : '',
                events_name: '',
                email: email,
            }
        }
        if((!validate_email(data.email) || !validate_phno(data.phone)) &&
        type == 1){
            if(!validate_email(data.email))
            alert('Enter Valid email');
            if(!validate_phno(data.phone))
            alert('Enter Valid Phone Number');
        }else{
            $.get('update_mem_details/'+id, data, function(res){
                if(res.status == 1){
                    me.html("Edit");
                    me.removeClass('update-det');
                    me.addClass('edit-det');
                    var del = me.parent().find('.cancel');

                    del.html('Delete');
                    del.addClass('del-det');
                    del.removeClass('cancel');
                    data.branch_yr = data.branch_yr;
                    if(type != 4){
                        convert_to_p(me.parent(), data, res.id);
                    }
                    else {
                        convert_to_p_t(me.parent(), data, res.id);
                    }
                }else{
                    me.html('Error');
                    setTimeout(function(){
                        me.html('Try Again');
                    }, 1000);
                }
            });
        }
    });

    $('#soc_select').change(function(){
        var value = $(this).val();
        $('#table-container').html('Lodaing...');
        $.get('acd/'+value, function(res){
            $('#table-container').html(res);
        });
    });

    function get_event_names(parent, events){
        var option = parent.find('.events option');
        var arr = [];
        option.each(function(x){
            if(events.indexOf($(this).attr('value')) != -1){
                arr.push($(this).html());
            }
        });
        return arr.toString();
    }

    function convert_to_p(td, data, id){
        var button = td.html();
        var tr = td.parent();
        tr.attr('id', id);
        tr.html('');
        var ev = '';
        console.log(data);
        console.log();
        if(data.events_name){
            ev = data.events_name.toString();
        }
        console.log(ev);
        var str = '<td>'+data.name+'</td>';
        str += '<td>'+data.branch_yr+'</td>';
        str += '<td>'+data.phone+'</td>';
        if(tr.parent().parent().attr('type') == 1)
        str += '<td>'+data.email+'</id>'
        else
        str += '<td>'+ev+'</td>';
        str += '<td>'+button+'</td>';
        tr.html(str);
    }

    function convert_to_p_t(td, data, id){
        var button = td.html();
        var tr = td.parent();
        tr.attr('id', id);
        tr.html('');
        var str = '<td>'+data.name+'</td>';
        str += '<td>'+data.phone+'</td>';
        str += '<td>'+button+'</td>';
        tr.html(str);
    }

    function inflate_tablerow(id){
        $('#table'+id+' tbody').append(row_generator(id));
    }

    function row_generator(type){
        var str = '<tr>';
        console.log(type);
        for(var i = 0; i < 5; i++){
            switch(i){
                case 0: str += '<td>'
                str += simple_text('Enter Name**', 'name', 50);
                str += '</td>'
                break;
                case 1: str += '<td>'
                str += opt_branches() +" ";
                str += opt_year();
                str += '</td>'
                break;
                case 2: str += '<td>'
                str += simple_text('Phone no.', 'phone', 10);
                str += '</td>'
                break;
                case 3: if(type == 1){
                    str += '<td>'
                    str += simple_text('Email', 'email', 50);
                    str += '</td>'
                }else{
                    str += '<td>'
                    str += opt_events();
                    str += '</td>'
                }
                break;
                case 4: str += '<th>'
                str += save_button();
                str += '</th>'
                break;
                default: return;

            }
        }
        return str + "</tr>";
    }

    function teach_row_gen(){
        var str = '<tr>';
        console.log('t');
        for(var i = 0; i < 3; i++){
            switch(i){
                case 0: str += '<td>'
                str += simple_text('Enter Name**', 'name', 50);
                str += '</td>'
                break;
                case 1: str += '<td>'
                str += simple_text('Phone no.', 'phone', 10);
                str += '</td>'
                break;
                case 2: str += '<td>'
                str += save_button_t();
                str += '</td>'
                break;
                default: return;

            }
        }
        return str + "</tr>";
    }

    $(document).on('change', '.branch', function(){

        var val = $(this).val();
        var year = $(this).siblings();

        if(val == 'MBA' || val == 'MTECH' ){
            year.html(opt_year_o(3));
        }else if(val == 'MCA'){
            year.html(opt_year_o(4));
        }else if(val == '-'){
            year.html(opt_year_o(1));
        }else {
            year.html(opt_year_o(5))
        }
    });

    function opt_branches(branch){
        if(!branch){
            branch = 0;
        }
        var br = ['-', 'CS', 'EC', 'CE', 'ME', 'EE', 'EEE',
        'IT', 'IC', 'MT', 'MCA', 'MBA', 'MTECH'];
        var str = '<select class="unblock branch form-control">';
        for (var i = 0; i < br.length; i++) {
            str += '<option value=' + br[i] +
            ' >';
            str += br[i];
            str += '</option>';
        }
        return str + '</select>';
    }

    function opt_year(yr){
        var x = 5;
        if(!yr){
            x = yr;
        }
        var str = '<select class="unblock year form-control">';
        for (var i = 1; i < x; i++) {
            str += '<option value=' + i + '>';
            str += i;
            str += '</option>';
        }
        return str + '</select>';
    }

    function opt_year_o(yr){
        var x = 5;
        var str = '';
        if(yr){
            x = yr;
        }
        for (var i = 1; i < x; i++) {
            str += '<option value=' + i + '>';
            str += i;
            str += '</option>';
        }
        return str;
    }

    function opt_events(){
        var str = '<select class="button-chod events form-control" multiple= "multiple">';
        for (var i = 0; i < Events.length; i++) {
            str += '<option value=' + Events[i].id + '>';
            str += Events[i].name;
            str += '</option>';
        }
        return str + '</select>';
    }

    function simple_text(placeholder, class_name, maxlen){
        return '<input type="text" name="'+name+'" placeholder="'+
        placeholder + '" class = "form-control button-chod ' +
        class_name + '" maxlength='+ maxlen +'/>';
    }

    function save_button(){
        return '<button type="button" class="save-det'+
        ' btn btn-default unblock button-chod'+
        '">Save</button>'+
        '<button type="button" class="cancel'+
        ' btn btn-danger unblock button-chod'+
        '">Cancel</button>'
    }

    function save_button_t(){
        console.log("as");
        return '<button type="button" class="save-det'+
        ' btn btn-default unblock button-chod'+
        '">Save</button>'
    }

    function validate_phno(data){

        if((data+'').length == 10)
        return true;
        return false;
    }

    function validate_email(email){

        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

});
</script>
