<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Gateway</title>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <style>
    .card1 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        margin: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 300px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
    }

    .btn {
        margin-top: 10px;
    }

    #btn_p {
        border: none;
        cursor: pointer;
    }

    #btn_p:hover {
        background-color: greenyellow;
        /* Background color on hover */
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- End Navbar -->

    <br>

    <!-- Card Section -->
    <div class="card1">
        <div class="card" style="width: 20rem;">
            <img src="https://thinkgis.in/cdn/shop/files/mockup-of-a-t-shirt-hanging-against-a-solid-background-26878_53.png?v=1689774627&width=1445"
                class="card-img-top" alt="AWS T-shirt">
            <div class="card-body">
                <h5 class="card-title">AWS T-shirt</h5>
                <p class="card-text">Regular price Rs. 449.00</p>

                <!-- Purchase Form -->
                <form action="submit.php" method="post" id="paymentForm">
                    <div style="display: flex; justify-content:space-between">
                        <div class="form-group">
                            <label for="color">Color</label>
                            <select class="form-control" id="color" name="color">
                                <option>BLACK</option>
                                <option>RED</option>
                                <option>BLUE</option>
                                <option>GRAY</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="size">Size</label>
                            <select class="form-control" id="size" name="size">
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                        </div>

                    </div>
                    <!-- Hidden fields for Stripe integration -->
                    <input type="hidden" id="stripeAmount" value="44900">
                    <input type="hidden" id="stripeName" value="ClowdRedux">
                    <input type="hidden" id="stripeDescription" value="Accelerating Business Transformation">
                    <input type="hidden" id="stripeImage"
                        value="https://media.licdn.com/dms/image/D4D0BAQEUF8aIBKiX7g/company-logo_200_200/0/1704179250567/cloudredux_logo?e=2147483647&v=beta&t=LeOQC-bkjOeAYHiQk06HHD_anKHXw9ylPD7Sv4UkUs4">
                    <input type="hidden" id="stripeCurrency" value="inr">
                    <input type="hidden" id="stripeEmail" value="aviralaviral7@gmail.com">

                    <button type="button" data-toggle="modal" data-target="#exampleModal"
                        class="btn btn-primary btn-lg btn-block" id="btn_p"">Purchase</button>


                </form>
                <!-- End Purchase Form -->
            </div>
        </div>
    </div>
    <!-- End Card Section -->
    
   

        <!-- Modal -->
        <div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="stripe_payment.php" method="POST" name="cardpayment"
                                        id="payment-form">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter name" name="name" required>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" name="email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <input type="hidden" class="form-control" id="course"
                                                        placeholder="Enter course" name="course"   value="AWS T-shirt" >
                                                      
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <input type="hidden" class="form-control" id="amount"
                                                        placeholder="Enter amount"  value="449" name="amount">
                                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 mb-3">
                                                    <label for="card_number">CARD NUMBER</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="card_number"
                                                            placeholder="Valid Card Number" autocomplete="cc-number"
                                                            id="card_number" maxlength="16" data-stripe="number"
                                                            required>
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-credit-card"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-4 col-md-4 mb-3">
                                                <label for="card_exp_month">Expiration Month</label>
                                                <select name="card_exp_month" id="card_exp_month" class="form-control"
                                                    data-stripe="exp_month" required>
                                                    <option value="">Select Month</option>
                                                    <option value="01">01 (JAN)</option>
                                                    <option value="02">02 (FEB)</option>
                                                    <option value="03">03 (MAR)</option>
                                                    <option value="04">04 (APR)</option>
                                                    <option value="05">05 (MAY)</option>
                                                    <option value="06">06 (JUN)</option>
                                                    <option value="07">07 (JUL)</option>
                                                    <option value="08">08 (AUG)</option>
                                                    <option value="09">09 (SEP)</option>
                                                    <option value="10">10 (OCT)</option>
                                                    <option value="11">11 (NOV)</option>
                                                    <option value="12">12 (DEC)</option>
                                                </select>
                                            </div>

                                            <div class="col-xs-4 col-md-4 mb-3">
                                                <label for="card_exp_year">Expiration Year</label>
                                                <select name="card_exp_year" id="card_exp_year" class="form-control"
                                                    data-stripe="exp_year" required>
                                                    <option value="">Select Year</option>
                                                    <option value="20">2020</option>
                                                    <option value="21">2021</option>
                                                    <option value="22">2022</option>
                                                    <option value="23">2023</option>
                                                    <option value="24">2024</option>
                                                    <option value="25">2025</option>
                                                    <option value="26">2026</option>
                                                    <option value="27">2027</option>
                                                    <option value="28">2028</option>
                                                    <option value="29">2029</option>
                                                    <option value="30">2030</option>
                                                    <option value="31">2031</option>
                                                    <option value="32">2032</option>
                                                    <option value="33">2033</option>
                                                    <option value="34">2034</option>
                                                    <option value="35">2035</option>
                                                </select>
                                            </div>

                                            <div class="col-xs-4 col-md-4 pull-right mb-3">
                                                <label for="card_cvc">CVV CODE</label>
                                                <input type="password" class="form-control" name="card_cvc"
                                                    placeholder="CVV" autocomplete="cc-csc" id="card_cvc" required />
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" id="payBtn" class="btn btn-primary">Submit</button>

                                        </div>
                                    </form>



                                </div>

                            </div>
                        </div>
            </div>




            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://js.stripe.com/v2/"></script>

            <script>
            // Set your publishable key
            Stripe.setPublishableKey(
                'pk_test_51PfxwvG6V4bCRsXiqdQ1CWoXh7DaInHz6JEeU4kZ32iKyGNpLdaPvIQzuQ8K0KWHe0D50VmzL5LJ7BYXKrIiY2sp00qLetES9d'
            );

            // Callback to handle the response from stripe
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // Enable the submit button
                    $('#payBtn').removeAttr("disabled");
                    // Display the errors on the form
                    $(".payment-status").html('<p>' + response.error.message + '</p>');
                } else {
                    var form$ = $("#payment-form");
                    // Get token id
                    var token = response.id;
                    // Insert the token into the form
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // Submit form to the server
                    form$.get(0).submit();
                }
            }

            $(document).ready(function() {
                // On form submit
                $("#payment-form").submit(function() {
                    // Disable the submit button to prevent repeated clicks
                    $('#payBtn').attr("disabled", "disabled");

                    // Create single-use token to charge the user
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        exp_month: $('#card_exp_month').val(),
                        exp_year: $('#card_exp_year').val(),
                        cvc: $('#card_cvc').val()
                    }, stripeResponseHandler);

                    // Submit from callback
                    return false;
                });
            });
            </script>

</body>

</html>