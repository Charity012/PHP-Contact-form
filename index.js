const form = document.querySelector("form");
statusTxt = form.querySelector("span");

form.onsubmit = (e)=>{
    e.preventDefault(); //Prevent form from submittng
    statusTxt.style.color = "#3f618c";
    statusTxt.style.display = "block";

    //Lets start ajax to send form data of html to php
    let xhr = new XMLHttpRequest(); //creating new xml object
    xhr.open("POST", "message.php", true); //sending post message.php file
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status ==200) { // 200 and 4 to show no error
            let response = xhr.response; //storing ajax response in a response variable
            if(response.indexOf("Email field is require!") != -1 || response.indexOf("Enter a valid email adress!")){
                statusTxt.style.color = "red";
            }else{
                form.rese();
                setTimeout(()=>{
                    statusTxt.style.display = "none";
                }, 3000);
            }
            statusTxt.innerText = response;
        }
    }
    //Lets send form data
    let formData = new FormData(form);//creating new formdata obj. Is used to send form data
    xhr.send(formData);//sending form data
}
