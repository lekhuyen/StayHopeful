let value = 0;
setInterval( () =>{
    rd = Math.floor(Math.random() * 1000) + 1;
    value += rd;
    odometer.innerHTML = value;
},3000)