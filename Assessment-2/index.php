<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity>
    <style>
        .container {
            align-items: center;
            margin-left: 149px;
            padding-top: 30px;
        }
    </style>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td id="header">
                    <h1> Ajax crud</h1>
                    <div id="search-bar">
                        <label>search:</label>
                        <input type="text" id="search" autocomplete="off">
                    </div>
                </td>
            </tr>
            <tr id="table-form">
                <td>
                    <form id="add-form">
                        <div id="booking-form ">
                            <div class="container col-md-6">
                                <label>Booking Type:</label>
                                <select id="booking-type" class="form-control">
                                    <option value="fullday">Full Day</option>
                                    <option value="half-day">Half Day</option>
                                    <option value="Custom">Custom</option>
                                </select>
                                <br>
                                <div id="checkin-date-div" style="display: none;">
                                    <label id="checkin-date-div">Check-in Date:</label>
                                    <input type="date" id="date" class="form-control">
                                </div>
                                <br>
                                <div id="checkout-date-div" style="display: none;">
                                    <label id="checkout-date-div"> Date:</label>
                                    <input type="datetime-local" id="time" class="form-control">
                                </div>


                                <label id="slot-label" style="display: none;">Slot:</label>
                                <select id="slot" class="form-control" style="display: none;">
                                    <option value="morning">Morning (8AM to 12PM)</option>
                                    <option value="Afternoon">Afternoon (12PM to 4PM)</option>
                                    <option value="Evening">Evening (4PM to 8PM)</option>
                                    <option value="night">night (4PM to 8PM)</option>

                                </select>
                                <br>
                                <button id="submit-button" class="btn btn-primary">Book Room</button>
                            </div>
                        </div>

                        <!-- First Name : <input type="text" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <!-- Last Name : <input type="text" id="lname"> -->
                    </form>
                </td>
            </tr>
            <tr>
                <td id="table-data"></td>
            </tr>
        </table>
        <div id="error-message"></div>
        <div id="success-message"></div>
        <div id="model">
    <div id="modal-form">
        <h2>Edit Form</h2>
        <table cellpadding="10px" width="100%">
        </table>
        <div id="close-btn"></div>
    </div>
</div>

    </div>
    <script type="text/javascript" src="js/script.js"></script>


</body>

</html>