function cadastrar(event) {
    
    event.preventDefault();


    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;
    var email = document.getElementById("email").value;
    var nome = document.getElementsById("email").value;

    //Daniz.Dev - 123456 - seilaman2@gmail.com
    
    if(usuario === "Daniz.Dev" && senha === "123456" && email === "seilaman2@gmail.com"){
        
        Swal.fire({
            title: 'Cadastro Realizado!',
            text: 'Bem-vindo',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            setTimeout(() => {
                location.href= "./index.html";
            }, 100);
        });
    }

}