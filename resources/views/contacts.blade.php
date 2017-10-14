@extends('layout.master');
@section('content')
    <body class="row">
    <div class="col-md-12">
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid black;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #e9e9e9;
            }

            .button {
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                padding: 7px 20px;
                border: 1px solid #000000;
                border-radius: 8px;
                background: #ffdd00;
                background: -webkit-gradient(linear, left top, left bottom, from(#ffdd00), to(#ffdd00));
                background: -moz-linear-gradient(top, #ffdd00, #ffdd00);
                background: linear-gradient(to bottom, #ffdd00, #ffdd00);
                font: normal normal normal 18px arial;
                color: #000000;
                text-decoration: none;
                margin-bottom: 2%;
            }

            .button:hover,
            .button:focus {
                background: #ffff00;
                background: -webkit-gradient(linear, left top, left bottom, from(#ffff00), to(#ffff00));
                background: -moz-linear-gradient(top, #ffff00, #ffff00);
                background: linear-gradient(to bottom, #ffff00, #ffff00);
                color: #000000;
                text-decoration: none;
            }

            .button:active {
                background: #998500;
                background: -webkit-gradient(linear, left top, left bottom, from(#998500), to(#ffdd00));
                background: -moz-linear-gradient(top, #998500, #ffdd00);
                background: linear-gradient(to bottom, #998500, #ffdd00);
            }
        </style>
        <section id="contactUs" class="contact-parlex">
            <div class="parlex-back">
                <div class="container">
                    <div style="margin-top: 6.5%" class="row">
                        <div class="heading text-center">
                            <!-- Heading -->
                            <h2 style="color: black">Contact Us</h2>
                            <p style="color: black">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered.</p>
                        </div>
                    </div>
                    <div class="row mrgn30">
                        <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
                        <form name="sentMessage" id="contactForm" novalidate>
                            <h3 style="color: black">Contact Form</h3>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control"
                                           placeholder="Full Name" id="name" required
                                           data-validation-required-message="Please enter your name"/>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="email" class="form-control" placeholder="Email"
                                           id="email" required
                                           data-validation-required-message="Please enter your email"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
		<textarea rows="10" cols="100" class="form-control"
                  placeholder="Message" id="message" required
                  data-validation-required-message="Please enter your message" minlength="5"
                  data-validation-minlength-message="Min 5 characters"
                  maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"></div> <!-- For success/fail messages -->
                            <button type="submit" class="btn button btn-primary pull-right">Send</button>
                            <br/>
                        </form>
                    </div>
                </div>
                <!--/.container-->
            </div>
        </section>
    </div>
    </div>
@stop