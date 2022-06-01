<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<style>
    #notificationadd, #notificationup {
  position: fixed;
  bottom: -8rem;
  color: white;
  background: #1d1b31;
  padding: 1.2rem 2.4rem;
  border-radius: 0.2rem;
  box-shadow: 3px 6px 12px rgba(0, 0, 0, 0.4);
  transition: all 0.4s;
  left: 150px; 
}
#notification.show {
  bottom: 2rem;
}
</style>
<script>

    

    function notifAdd(){
     const toast = document.querySelector('#notificationadd');
     
     toast.classList.add("show");
     setTimeout(() => {
         toast.classList.remove("show");
     }, 2000);
     
    };

    function notifUp(){
     const toast = document.querySelector('#notificationup');
     
     toast.classList.add("show");
     setTimeout(() => {
         toast.classList.remove("show");
     }, 2000);
     
    };

 </script>

<script>

var username = "<?php echo $_COOKIE['username'] ?>"

$(document).ready(function () {
	
	// function to check mobile view width
	
	 function mobileCheck() {
        if (window.innerWidth < 1000 ) 
        { 
           return false;
        } else {
            return true;
        }
    };
	
    var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		defaultView: mobileCheck() ? "month" : "basicWeek", // check calender open in mobile or desktop
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true,
        events: "all_events.php",
        displayEventTime: false,
        longPressDelay : mobileCheck() ? '' : '1',
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = username;
            //var title = "Test";

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
				
				// Add new event ajax Post
				
                $.ajax({
                    url: 'add_event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
						
						calendar.fullCalendar('renderEvent',
                        {
                            id: data,
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay,
                        },
					true
                        );
						
                        notifAdd();
                    
                    }
                });
                
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    
                    // By Drag and drop update event date
                    
                    $.ajax({
                        url: 'change_event_date.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            notifUp();
                        }
                    });
                },
        eventClick: function (event) {
            var confimit = confirm("Do you really want to delete?");
            if (confimit) {

                $.ajax({
                    type: "POST",
                    url: "delete_event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
						
                        if(parseInt(response) > 0) {
							
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            //displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
            
        }

    });
   
});

// function to display message

function displayMessage(message) {
    //window.location.href="#success";
    //setTimeout(() => {
    //    window.location.href='#';
    //}, 1500);
	//$(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#1d1b31; font-family: Arial;' class='success'>"+message+"</div>");
    //setInterval(function() { $(".success").fadeOut(); }, 1000);
}


</script>

<style>



  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1000px;
    margin: 0 auto;
  }
  .fc-next-button, .fc-prev-button, .fc-today-button{
      border: 3px solid #11101D;
      margin-left: 7px;
  }
    .fc-next-button:hover, .fc-prev-button:hover, .fc-today-button:hover{
        background-color: black;
        
    }
    .fc-month-button, .fc-basicDay-button, .fc-basicWeek-button{
        border: 3px solid #11101D;
    }

  p span {
            display: inline-block;
            position: relative;
            overflow: hidden;
            font-size: 40px;
            text-align: center;
            margin-left: 150px;
        }
        p span::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform: translateX(-100%);
        }
            p:nth-child(1) {
                font-weight: 300;
                animation: txt-appearance 0s 0.5s forwards;
            }
            
            p:nth-child(1) span::after {
                background: #1d1b31;
                animation: slide-in 0.75s ease-out forwards,
                slide-out 0.75s 0.5s ease-out forwards;
            }
            

            @keyframes slide-in {
                100% {
                    transform: translateX(0%);
                }
            }
            @keyframes slide-out {
                100% {
                    transform: translateX(100%)
                }
            }
            @keyframes txt-appearance {
                100% {
                    color: #222;
                }
            }
        /*.modal {
            margin-left: 150px;
            opacity: 0;
            position: absolute;
            top: 0; right: 0;
            bottom: 0; left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }
        .modal:target {
            visibility: visible;
            opacity: 1;
        }
        .modal_content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #1d1b31;
            padding: 1.5em 2em;
            color: white;
        }
        
        .modal_close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            text-decoration: none;
        }
        #hidden-username{
            display: none;
        }
*/
#connect{
    margin-left: 150px;
}
</style>
</head>
<body>

    <script>
        //document.onload("window.location.href='#connect'")
        //function getUsername(){
        //    var username = prompt('Enter your username : ');
        //}
    </script>
    
    <?php  include "navbar.php"; ?>
    
    <div class="title">
        <p>
        <span>
            Planning
        </span>
        </p>
        
    </div>
    <!---->
    
  <div class="response"></div>
  
  <div id='calendar'></div>

  

</body>
</html>
