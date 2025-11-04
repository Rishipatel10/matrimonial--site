<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--  <link rel="stylesheet" href="script/bootstrap.min.css"> -->
        <link rel="stylesheet" href="script/emojionearea.min.css">
  		<script src="script/jquery-ui.js"></script>
  		<script src="script/emojionearea.min.js"></script>
  		<script src="script/jquery.form.js"></script>
  		<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .btn1:hover {
            background-color: red;
        }
        ::-webkit-scrollbar {
            width: 7px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(195, 33, 67, 0.72);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(195, 33, 67, 0.72);
        }
        .chat_message_area {
            position: relative;
            width: 100%;
            height: auto;
            background-color: #FFF;
            border: 1px solid #CCC;
            border-radius: 3px;
        }
        #group_chat_message {
            width: 100%;
            height: auto;
            min-height: 80px;
            overflow: auto;
            padding: 6px 24px 6px 12px;
        }
        .image_upload {
            position: absolute;
            top: 3px;
            right: 3px;
        }
        .image_upload > form > input {
            display: none;
        }
        .image_upload img {
            width: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span> +91 99986 75436 &nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span> vivaahmilan123@gmail.com</h2>
            </div>
            <div class="row wed-foot-link wed-foot-link-1">
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>Address: 113,Raj Victoria, New Pal Lake Rd, opp. Raj Arcade, Near Galaxy Circle, Pal Gam-395009 Surat, Gujarat (India)</p>
                    <p>Phone: <a href="tel:+917990212140">+ 99986 75436</a></p>
                    <p>Email: <a href="mailto:info@example.com">vivaahmilan123@gmail.com</a></p>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="index.php">About company</a></li>
                        <li><a href="index.php">Contact us</a></li>
                        <li><a href="login.php">Feedback</a></li>
                        <li><a href="login.php">FAQs</a></li>
                        <li><a href="about.php">Testimonials</a></li>
                    </ul>
                </div>
                <div class="col-md-4 fot-soc">
                     <h4>Grateful for Your Visit</h4>
                    <ul>
                        <li>Thank you for visiting our  website — we’re honored to be a part of your journey toward finding a meaningful connection.</li>
                        
                    </ul> 
                </div>
            </div>
            <div class="row foot-count">
                <p>Vivahmilan - Trusted by over thousands of Boys & Girls for successful marriage. <a href="sign_up.php" class="btn btn-primary btn-sm">Join us today!</a></p>
            </div>
        </div>
    </section>
    <!-- END FOOTER -->

    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright © <span id="cry">2025</span> <a href="#!">vivaahmilan123@gmail.com</a> All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END COPYRIGHTS -->

    <!-- CHAT SECTION -->
    <?php if (isset($_SESSION['member_id'])) : ?>
        <div class="ask_question_div" id="myQuestionDiv" style="display: none; height: 550px; width: 400px; border: 2px solid #ccc; position: fixed; bottom: 70px; right: 10px; background-color: #efefef; padding: 5px 10px; border-radius: 8px; overflow: auto; z-index: 100; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="container" style="max-width: 100%; padding: 0px;">
                <div id="user_details"></div>
                <div id="user_model_details"></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['member_id']) && isset($_SESSION['cnt_member']) && $_SESSION['cnt_member'] != 0) : ?>
        <div style="display: flex; position: fixed; bottom: 30px; right: 75px; z-index: 100;">
            <button class="ask_question btn1" style="height: 40px; width: 90px; position: fixed; margin-left: -2%; color: white; border-radius: 20px 0px 20px 20px; background-color: #c32143b8; margin-top: -2%;" onclick="myToggleQuestion()">Chat With</button>
        </div>
    <?php endif; ?>

    <script>
        function myToggleQuestion() {
            var x = document.getElementById("myQuestionDiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready(function () {
            console.log("jQuery Version:", jQuery.fn.jquery);
            console.log("jQuery UI:", $.fn.dialog ? "Loaded" : "Not Loaded");
            console.log("EmojioneArea:", $.fn.emojioneArea ? "Loaded" : "Not Loaded");

            fetch_user();
            setInterval(function () {
                update_last_activity();
                fetch_user();
                update_chat_history_data();
            }, 5000);

            function fetch_user() {
                $.ajax({
                    url: "chat/fetch_user.php",
                    method: "POST",
                    success: function (data) {
                        $('#user_details').html(data);
                    }
                });
            }

            function update_last_activity() {
                $.ajax({
                    url: "chat/update_last_activity.php",
                    success: function () {}
                });
            }

            function make_chat_dialog_box(to_user_id, to_user_name) {
                var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
                modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
                modal_content += fetch_user_chat_history(to_user_id);
                modal_content += '</div>';
                modal_content += '<div class="form-group">';
				modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message" placeholder="Type a message here..."></textarea>';

                modal_content += '<span class="chat-error" id="error_msg_' + to_user_id + '" style="color:red; font-size:13px; display:none; margin-top:5px;"></span>';
                modal_content += '</div><div class="form-group" align="right">';
                modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
                $('#user_model_details').html(modal_content);
            }

            $(document).on('click', '.start_chat', function () {
						var to_user_id = $(this).data('touserid');
						var to_user_name = $(this).data('tousername');
						make_chat_dialog_box(to_user_id, to_user_name);
						$("#user_dialog_" + to_user_id).dialog({
							autoOpen: false,
							width: 400
						});
						$('#user_dialog_' + to_user_id).dialog('open');
						$('#chat_message_' + to_user_id).emojioneArea({
							pickerPosition: "top",
							toneStyle: "bullet"
						});
					});

				$(document).on('click', '.send_chat', function () {
					var to_user_id = $(this).attr('id');
					var element = $('#chat_message_' + to_user_id).emojioneArea();
					var chat_message = element[0].emojioneArea.getText().trim();

					if (chat_message === '') {
						$('#error_msg_' + to_user_id).text('Please enter a message.').show();
						return false;
					} else {
						$('#error_msg_' + to_user_id).hide(); // Clear old error if any
					}

					$.ajax({
						url: "chat/insert_chat.php",
						method: "POST",
						data: { to_user_id: to_user_id, chat_message: chat_message },
						success: function (data) {
							element[0].emojioneArea.setText('');
							$('#chat_history_' + to_user_id).html(data);
						}
					});
				});


			
			

            function fetch_user_chat_history(to_user_id) {
                $.ajax({
                    url: "chat/fetch_user_chat_history.php",
                    method: "POST",
                    data: { to_user_id: to_user_id },
                    success: function (data) {
                        $('#chat_history_' + to_user_id).html(data);
                    }
                });
            }

            function update_chat_history_data() {
                $('.chat_history').each(function () {
                    var to_user_id = $(this).data('touserid');
                    fetch_user_chat_history(to_user_id);
                });
            }

            $(document).on('click', '.ui-button-icon', function () {
                $('.user_dialog').dialog('destroy').remove();
                $('#is_active_group_chat_window').val('no');
            });

            $(document).on('focus', '.chat_message', function () {
                var is_type = 'yes';
                $.ajax({
                    url: "chat/update_is_type_status.php",
                    method: "POST",
                    data: { is_type: is_type },
                    success: function () {}
                });
            });

            $(document).on('blur', '.chat_message', function () {
                var is_type = 'no';
                $.ajax({
                    url: "chat/update_is_type_status.php",
                    method: "POST",
                    data: { is_type: is_type },
                    success: function () {}
                });
            });
        });
    </script>
</body>
</html>