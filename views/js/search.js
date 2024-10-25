const input = document.querySelector('.search-app_input');
const searchButton = document.getElementById('search-app_button');

console.warn(searchButton);

//Know input actions, add text or delete:
const showSearchButton = (ev) => {  

    if(input.value !== ''){
        document.getElementById('search-app_button').classList.remove('d-none');
    }
    
    if(ev.keyCode == 46 || ev.keyCode == 8){
        if(input.value.length == 1){
            document.getElementById('search-app_button').classList.add('d-none');
            console.warn("input is empty!");
        } 
    }
}

const startSearching = (ev) => {
    
    ev.preventDefault();

    if(input.value !== ''){

        console.warn('el input se va a la nueva página: ', input.value);
        window.location = domain + "search"+"/?search="+input.value;
        
        console.warn('button "buscar" clicked');

    }else{

        console.warn('EL INPUT NO PUEDE ESTAR VACÍO');

    }
    
    
    
}

input.addEventListener("keydown", showSearchButton);
searchButton.addEventListener("click", startSearching);

