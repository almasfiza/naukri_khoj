

        function testPass() {
            pass = document.getElementById('pwd').value
            var count = 0;
            
            //counting the conditions satisfied, to manipulate the progress bar accordingly
            //special charcter, uppercase, lowercase and digits
            if(pass.match(/[!@$%^&*]+/ig)) {
                count+=1;
            }if(pass.match(/[A-Z]+/g)) {
                count+=1;
            }if(pass.match(/[a-z]+/g)) {
                count+=1;
            }if(pass.match(/[0-9]+/ig)){
                count+=1;
            }
            
            //progress bar 
            if(count==1){
                document.getElementById('progress-bar').value = "25";
                document.getElementById('progress-bar').style.color = "red";
            }else if(count==2){
                document.getElementById('progress-bar').value = "50";
            }else if(count==3){
                document.getElementById('progress-bar').value = "75";
            }else if(count==4){
                document.getElementById('progress-bar').value = "100";
            }
           
            
            
            
        }

        function checkPass(){
            setPass = document.getElementById('pwd').value
            conPass = document.getElementById('confirm-pwd').value
            if (setPass == conPass) {
                document.getElementById("confirm-pass-msg").innerHTML = "Passwords match.";
            } else {
                document.getElementById("confirm-pass-msg").innerHTML = "Passwords do not match!";
            }

        }
 