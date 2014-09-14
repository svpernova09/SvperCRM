$(function(){
    // Show UTC time from server in local AM/PM format.
    $('.datetime-display').each(function() {
        $elem = $(this);
        $elem.text(mysqlUTCDateStringToLocal($elem.text()));
    });

    // Create datetimepickers
    $('.datetime-input-crm').each(function(){

        var $elem = $(this);

        // Convert the datestring from the server on 'edit' pages
        if( $elem.val() && $elem.val().length ) {
            $elem.val(mysqlUTCDateStringToLocal($elem.val()));
        }

        // Initialize the Rome datetimepickers
        rome(this, {
            timeFormat: 'hh:mm a',
            inputFormat: 'YYYY-MM-DD hh:mm A',
            time: true,
            timeInterval: 900
        }).on('data', function(val) {
            // convert Rome datestring to valid Date object.
            var mDate = rome.moment(val, 'YYYY-MM-DD hh:mm A');

            // Populate hidden datefield with MYSQL formatted Datetime string (in UTC)
            $elem.siblings('input[type=hidden]').val(mDate.utc().format('YYYY-MM-DD HH:mm:[00]'));
        });

    });

    function mysqlUTCDateStringToLocal( datetimeString ) {
        return moment
            .utc(datetimeString,'YYYY-MM-DD HH:mm:ss')
            .local()
            .format('YYYY-MM-DD hh:mm A');
    }
});