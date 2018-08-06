/**
 * TODO
 * 1.hindra att requests skickas med tomma fält
 * 2.se till så att man inte behöver refresha sidan för att kunna skicka en ny
 * post för att lagra nya värden.
 */


//global variables
var xhr = new XMLHttpRequest();

//reference to html elements
var rankList = document.getElementById('rank_list');
var name_field = document.getElementById('name');
var word_field = document.getElementById('word');
var count_field = document.getElementById('count');
var submit_btn = document.getElementById('submitBtn');

function init(){
    //show and get llist of most used word on page load
    rank_list_request();
    submit_btn.addEventListener("click",submit_form);
}
window.onload = function(){init()};

function submit_form(){
    var input_name = name_field.value;
    var input_word = word_field.value;
    var input_count = count_field.value;

    xhr.open('POST','query.php',true);

    var formdata = new FormData();
    formdata.append('name',input_name);
    formdata.append('word',input_word);
    formdata.append('count',input_count);

    xhr.onload = function() {
        if(xhr.status == 200) {
            console.log(xhr.responseText);
        }else if(xhr.status == 500){
            console.log("Server error: 500");
        }
    }

    xhr.send(formdata);
}

function rank_list_request(){
    xhr.open('GET','getQuery.php',true);

    xhr.onload = function(){
        if(this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            for(i=0;i<myObj.length;i++){
                var jobj = myObj[i];
                rankList.innerHTML += "<li>"+jobj.word+"</li>";
            }
            
        }else if(this.status == 500){
            console.log("Internal server error: 500");
        }
    }
    xhr.send();
}