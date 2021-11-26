


    var senha = document.querySelector("#senha");
    var confirmaSenha = document.querySelector("#confirmar-senha");
    var confirm = document.querySelector("#confirmar-senha");
    console.log(confirm)
    confirm.addEventListener("focusout", function(){
        if(confirmaSenha.value!=senha.value){
            console.log(confirmaSenha.value);
            console.log(senha.value);
            alert("Senhas diferentes");
        }
    });
   
