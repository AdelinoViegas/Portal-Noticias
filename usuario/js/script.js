
let notice =  document.querySelectorAll('#describe_notice');
let paragraph = document.querySelectorAll('.category .notice p');
let title_notice = document.querySelector('.barra_bottom .barra_red #text2');
let menu_mobile = document.querySelector('header .navigation nav');
let links = document.querySelectorAll('header .navigation .menu a'); 



window.onresize = ()=>{


for(let text of notice){
  
  if(innerWidth >= 1064){
      if(text.innerText.length > '100'){
    		text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,100);
            text.innerText += '...';
      }

  }else if((innerWidth >= 950)){
      if(text.innerText.length > '85'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,85);
            text.innerText += '...';
      }

  }else if((innerWidth >= 850)){
      if(text.innerText.length > '65'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,65);
            text.innerText += '...';
      }

  }else if((innerWidth >= 750)){
      if(text.innerText.length > '45'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,45);
            text.innerText += '...';
      }

  }else if((innerWidth >= 450)){
       
      if(text.innerText.length > '40'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,40);
            text.innerText += '...';
      } 
        
  }else if((innerWidth >= 350)){
       
      if(text.innerText.length > '25'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,25);
            text.innerText += '...';
      } 
        
  }else if((innerWidth >= 250)){
       
      if(text.innerText.length > '5'){
            text.style.maxHeight = "88px";
            text.innerText = text.innerText.substr(0,5);
            text.innerText += '...';
      } 
        
  }      

}





   if(innerWidth >= 1064){

      if(title_notice.innerText.length > '90'){
        title_notice.innerText = title_notice.innerText.substr(0,90);
        title_notice.innerText += '...';
      } 

  }else if((innerWidth >= 950)){

       if(title_notice.innerText.length > '80'){
        title_notice.innerText = title_notice.innerText.substr(0,80);
        title_notice.innerText += '...';
      }

  }else if((innerWidth >= 850)){

      if(title_notice.innerText.length > '70'){
        title_notice.innerText = title_notice.innerText.substr(0,70);
        title_notice.innerText += '...';
      }

  }else if((innerWidth >= 750)){

      if(title_notice.innerText.length > '35'){
        title_notice.innerText = title_notice.innerText.substr(0,35);
        title_notice.innerText += '...';
      }
  }else if((innerWidth >= 520)){
             
      if(title_notice.innerText.length > '12'){
        title_notice.innerText = title_notice.innerText.substr(0,12);
        title_notice.innerText += '...';
      }
  }else if((innerWidth >= 350)){
       
      if(title_notice.innerText.length > '8'){
        title_notice.innerText = title_notice.innerText.substr(0,10);
        title_notice.innerText += '...';
      }
        
  }else if((innerWidth >= 250)){
       
      if(title_notice.innerText.length > '4'){
        title_notice.innerText = title_notice.innerText.substr(0,4);
        title_notice.innerText += '...';
      }
        
  }     



}


for(let text of paragraph){

   if(text.innerText[text.innerText.length - 1] !== '.'){
           text.innerText += '.';
  }
  
}


menu_mobile.onclick = ()=>{

menu_mobile.classList.toggle('show');

}



