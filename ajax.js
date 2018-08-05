document.getElementById('button').addEventListener("click",requesting);

function requesting(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','getQuery.php',true);

    xhr.onload = function(){
        if(this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            for(i=0;i<myObj.length;i++){
                var jobj = myObj[i];
                document.getElementById("rank").innerHTML += "<ol><li>"+jobj.word+"</li></ol>";
            }
            
        }else if(this.status == 500){
            console.log("Internal server error: 500");
        }
    }
    xhr.send();
}