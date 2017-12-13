$(document).ready( function() {
    
    var username = null; 
    var password = null;
    var first_name = null;
    var last_name = null;
    var email = null;
    var swipes = null;
    

    
    $('#main-box').hide();
   // $('#logout').hide();


         //if radio buttons change
    $('#login_options').change(function(){ 
            var selectedValue = $("input[name='option']:checked").val();     
            
            $('#main-box').show(); 
            
            
            if (selectedValue == 'create') {
                $('#create-specific').show();           
            }
            
            else if (selectedValue === 'login') {
                $('#create-specific').hide();
            }
            
        });
        
       
        //when submit is clicked
    $("#submit").click(function(){ //when startgame is clicked   
            var selectedValue = $("input[name='option']:checked").val();            
            
            if (selectedValue == 'create') {
                addNewUser();
            }
            
            else if (selectedValue === 'login') {
                login();
            }

        });
            
    
        
    function addNewUser() { 
             username = $("#username").val();
             password = $("#password").val();
             first_name = $("#first_name").val();
             last_name = $("#last_name").val();
             email = $('#email').val();
             swipes = $('#swipes').val();
          
             $.ajax({
                type: 'POST',
                data: { username : username, password: password, first_name: first_name, last_name: last_name, email: email, swipes: swipes },
                url: 'createUser.php',
                success: function(data) {
                    alert(data);
                    $("p").text(data);
                    userProfile(first_name, email, swipes);
                   
                }
            });
        };
    
    
    function login() {
            
            username = $("#username").val();
            password = $("#password").val(); //both username & password must be less than 50 characters 
          
             $.ajax({
                type: 'GET',
                data: { username : username, password: password },
                url: 'login.php',
                success: function(data) { //data is now the JSON object that's returned by PHP script
                    
                    try{
                        var userInfo = JSON.parse(data);
                        userProfile(userInfo.first_name, userInfo.email, userInfo.swipes);
                       // $('#logout').show();
     
                    }
                    catch (err) {
                        alert(err);
                        alert("Incorrect username or password");
                    }
                    
                }
            });
            
            
        };
    
    
    function userProfile(first_name, email, swipes) {
        var updateSwipesButton = '<br><button type="button" id="update-swipes">Update Number of Swipes</button>';
        var viewSwipes = '<br><button type="button" id="view-swipes">View All Swipes Records</button>';
        var logoutButton = '<br><button type="button" id="logout">Logout</button>'
        var welcomeMessage = 'Welcome ' + first_name;
        var emailMessage = 'Email Address: ' + email;
        var swipesMessage = 'Number of Swipes up for Grabs: ' + swipes;
        
        $('#main-box').empty();
        
        $('#main-box').append(welcomeMessage);
        $('#main-box').append('<br>');
        $('#main-box').append(emailMessage);
        $('#main-box').append('<br>');
        $('#main-box').append(swipesMessage);        
        $('#main-box').append(updateSwipesButton);  
        $('#main-box').append(viewSwipes);  
        $('#main-box').append(logoutButton);

        
        
        
        
        $("#update-swipes").click(function(){
                userProfile(first_name, email, updateSwipes());
        });
        
        
        $("#view-swipes").click(function(){
             window.open('table.php');
        });
        
        
        
        $('#logout').click(function() {
            location.reload();       
        
        })
    }
        
    
    function updateSwipes() {
        swipes = prompt("Enter New Number of Swipes");
        $.ajax({
                type: 'POST',
                data: { username : username, password: password, swipes: swipes },
                url: 'updateSwipes.php',
                success: function(data) {
                }
        });
            
        
        return swipes;
 
    }

    
    
});
    
    

