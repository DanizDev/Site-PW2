function logar(event) {
    
    event.preventDefault();


    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;

    //Daniz.Dev - 123456
    //admin 
    if(usuario === "admin" && senha === "admin"){
        
        Swal.fire({
            title: 'Login Realizado!',
            text: 'Bem-vindo',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            setTimeout(() => {
                location.href= "./html/home.html";
            }, 100);
        });

    }else{

        Swal.fire({
            title: 'Login não realizado',
            text: 'Dados incorretos!!!!',
            icon: 'error',
            confirmButtonText: 'Tente Novamente!'
        });
    }

}


''