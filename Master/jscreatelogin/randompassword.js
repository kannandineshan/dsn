/**
 * Created by Christophe on 08/03/2016.
 */

//keylist contains all possible characters for password
var keylist = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

//function for creation of random password
function randompassword(){
    temp = "";
    //15 characters in the password
    for(i=0; i<15; i++){
        //periodic positioning of "-"
        if(i % 4 === 3 && i !=0){
            temp += "-";
        }
        else{
            //use math functions to pick a random number between 0-1 and multiply by length of keylist
            temp += keylist.charAt(Math.floor(Math.random()*keylist.length));
        }
    }
    //returns password
    return temp;
}

//function to assign random password to an input value
function output(){
    document.getElementById("pass").value = randompassword();


}