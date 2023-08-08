$(document).ready(function() {
    $('#booking-type').change(function() {
        // Load Table Records
        function loadTable(){
            $.ajax({
            url :"ajax-load",
            type : "POST",
            success : function(data){
                $("#table-data").html(data);
            }
            });
        }
        loadTable(); // Load Table Records on Page Load

        var bookingType = $(this).val();

        if (bookingType == 'half-day') {
            $('#slot-label').show();
            $('#slot').show();
            $('#checkin-date-div').hide();
            $('#checkout-date-div').hide();
        } else if (bookingType == 'fullday') {
            $('#slot-label').hide();
            $('#slot').hide();
            $('#checkin-date-div').show();
            $('#checkout-date-div').hide();
        } else if (bookingType == 'Custom') {
            $('#slot-label').hide();
            $('#slot').hide();
            $('#checkin-date-div').hide();
            $('#checkout-date-div').show();
        }
    });

    $('#submit-button').click(function(e) {
        e.preventDefault();
        var bookingType = $('#booking-type').val();
        var date = $('#date').val();
        var time = $('#time').val();
        var slot = $('#slot').val();
    
        // Perform client-side validation
        if (bookingType === 'fullday') {
            if (!date) {
                alert('Please select a date.');
                return;
            }
        } else if (bookingType === 'Custom') {
            /* if (!date) {
                alert('Please select a date.');
                return;
            } */
            if (!time) {
                alert('Please select a date time.');
                return;
            }
        } else if (bookingType === 'half-day') {
            if (!slot) {
                alert('Please select a slot.');
                return;
            }
        }
    
        // Process form submission with AJAX
        $.ajax({
            url: "ajax-insert",
            type: "POST",
            data: {
                date: date,
                time: time,
                slot: slot
            },
            success: function(data) {
                if (data == 1) {
                    //loadTable();
                    $("#add-form").trigger("reset");
                    $("#success-message").html("Data inserted successfully.");
                    $("#success-message").slideDown();
                } else {
                    $("#error-message").html("Can't save record.");
                    $("#error-message").slideDown();
                }
            }
        });
    });
    //delete records
    $(document).on("click",".delete-btn",function(){
        if(confirm("Do ReallY want really this this record ?")){
            // alert('helo world');
            var  dataId=$(this).data("delete_id");
            var  rowId=$(this).closest('tr').data("row_id");
            var element =this;

            $.ajax({              
                url:"delete",
                type:"POST",
                data:{
                    dataId: dataId,
                },

                success:function(data){
                    if(data==1){
                        $('.row_data'+rowId).remove();
                        //$.element.closest("tr").fadeout();
                    }else{
                        $("#error-message").html("can't delete record. ").slideDown();
                        $("#success-message").slideUp();
                    }
                }
            });
        }
    })
    $(document).on("click",".edit-btn",function(){
        $("#model").show();
        var  dataId=$(this).data("edit_id");
        $.ajax({
            url:"loadupdate",
            type:"POST",
            data:{data:dataId
            ,},
            success:function(data){
                $("model-form table").html(data);
            }
        })

    });
    $("#close-btn").on("click",function(){
        $("#model").hide();
    });
    $(document).on("click","#edit-submit",function(){
        var dataId=$("#edit_id").val();
        var slot=$("#slot").val();

        $.ajax({
            url:"update",
            type:"POST",
            data:{
                data:dataid,
            },
            success:function(data){
                if(data==1){
                    $("#model").hide();
                    loadTable();
                }
            }
        })
    });
});    