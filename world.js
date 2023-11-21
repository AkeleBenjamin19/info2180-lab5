document.addEventListener("DOMContentLoaded",function(){
    let searchBtn=document.getElementById("lookup");
    let searchCityBtn = document.getElementById("cityLookUp");
    let userInput= document.getElementById("country").value;


    searchBtn.addEventListener("click",function(){
        let link="http://localhost/info2180-lab5/world.php?country="+ encodeURIComponent(userInput);
        lookup(link);
    })

   function lookup(input){
    fetch(input)
    .then(response=>{
        if(response.ok){
            return response.text();
        }
        else{
            throw Error("An error occured with the Network");
        }
    })
    .then(data=>{
        document.getElementById("result").innerHTML=data
    })
    .catch(error=>{
        console.error('Fetch error:',error)
    })
    
   } 

   
   searchCityBtn.addEventListener("click",function(){
    let link="http://localhost/info2180-lab5/world.php?country="+ encodeURIComponent(userInput)+ "$lookup=cities";

    lookup(link);
   })

})
