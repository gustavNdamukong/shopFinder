    /*----------------------------------------------------
     * Copyright Gustav Digitals
     * http://www.gustavdigitals.com
     * Validate
     * validate.js
    ----------------------------------------------------*/


    function validateFirstname(field) {
            if (field == "") 
            {
                            return "Please enter your first name";
            }
                            return "";	
    }

    function validateSurname(field) {
            if (field == "") 
            {
                    return "No Surname was entered.\n";
            }
            return "";
    }



    function validateUsername(field) 
    {
            if (field == "") 
            {		
                    return "Please enter a username";
            }
            else if (field.length < 5)
            {
                    return "The username must be at least 5 characters long";
            }
            else if (/[^a-zA-Z0-9_-]/.test(field))
            {
                    return "The username must only contain numbers, letters, a dash, or an underscore ";
            }

                    return "";	
    }



    function validatePassword(field) {
            if (field == "") return "Please enter your password";
            else if (field.length < 6)
                    return "A password cannot be less than 6 characters long";


            <!--WE CAN MAKE THE PW EVEN STRONGER AND ACCEPT IT ONLY IF IT CONTAINS AT LEAST ONE SMALL LETTER, ONE UPPERCASE LETTER, AND ONE NUMBER, BUT IN THIS CASE WE WILL NOT BECAUSE OUR PHP CODE WILL STILL VALIDATE THE PW PROPERLY. HNCE WE COMMENT OUT THE FOLLOWING 4 LINES-->
            //else if (! /[a-z]/.test(field) ||
                             //! /[A-Z]/.test(field) ||
                         //! /[0-9]/.test(field))
                    //return "Passwords require one each of a-z, A-Z and 0-9.\\n"
            return "";
    }

    function validateAge(field) {
            if (isNaN(field)) 
            {
                return "No Age was entered.\n";
            }
            else if (field < 18 || field > 110)
            {
                return "Age must be between 18 and 110.\n";
            }
            
            return "";
    }

    function validatePhone(field) {
            if (isNaN(field)) return "No Phone number was entered.\n";
            else if (field.length > 16)
                    return "Phone number must not be more than 15 figures.\n";
            return "";
    }

    function validateEmail(field) {
            if (field == "") 
            { 
                return "No Email was entered.\n";
            }
            else if (!((field.indexOf(".") > 0) &&
                                   (field.indexOf("@") > 0)) ||
                                   /[^a-zA-Z0-9.@_-]/.test(field))
            {
                    return "The Email address is invalid.\n";
            }
            
            return "";
    }
    
    
    
    


    function checkUsername(username)
    {
            if (username.value == "")
            {
                    document.getElementById("info").innerHTML = "";
                    return false;
            }

            params  = "username=" + username.value;
            request = new ajaxRequest();
            request.open("POST", "checkusername.php", true);
            request.setRequestHeader("Content-type",
                    "application/x-www-form-urlencoded");
            request.setRequestHeader("Content-length", params.length);
            request.setRequestHeader("Connection", "close");

            request.onreadystatechange = function()
            {
                    if (this.readyState == 4)
                    {
                            if (this.status == 200)
                            {
                                    if (this.responseText != null)
                                    {
                                        //The AJAX request was successful, and 'responseText' contains your result,
                                        // so do whatever you want to do with it here
                                            document.getElementById("info").innerHTML =
                                                    this.responseText;
                                    }
                                    else alert("Ajax error: No data received");
                            }
                            else alert( "Ajax error: " + this.statusText);
                    }
            }
            request.send(params);
    }


    function ajaxRequest()
    {
            try
            {
                    var request = new XMLHttpRequest();
            }
            catch(e1)
            {
                    try
                    {
                            request = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    catch(e2)
                    {
                            try
                            {
                                    request = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            catch(e3)
                            {
                                    request = false;
                            }
                    }
            }
            return request;
    }





    <!--You can use this ajax code below to dynamically display eg a reminder/warning set on a timer-check it out-->



   /* function displayWord(word)
    {
        params  = "floatbox=" + floatbox.value;
        request = new ajaxRequest();
        request.open("POST", "displayword.php", true);
        request.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        request.setRequestHeader("Content-length", params.length);
        request.setRequestHeader("Connection", "close");

        request.onreadystatechange = function()
        {
            if (this.readyState == 4)
            {
                if (this.status == 200)
                {
                    if (this.responseText != null)
                    {
                        document.getElementById("display").innerHTML =
                            this.responseText;
                    }
                    else alert("Ajax error: No data received");
                }
                else alert( "Ajax error: " + this.statusText);
            }
        }
        request.send(params);
    }


    function ajaxRequest()
    {
        try
        {
            var request = new XMLHttpRequest();
        }
        catch(e1)
        {
            try
            {
                request = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e2)
            {
                try
                {
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e3)
                {
                    request = false;
                }
            }
        }
        return request;
    }
    
    */
    






