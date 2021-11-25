$(document).ready(function(){ 
    var senha = $("#senha").val();
    var confirmaSenha = $("#confirma-senha").val();

    confirmaSenha.on("focusout",function(){
        if(confirmaSenha!=senha){
            alert("Senhas diferentes");
            return false;
        }
        if(senha == " " || senha.length < 6 || confirmaSenha.length <6){
            alert("Preencha o campo com Senha com no mínimo 6 caracteres");
        }
    });
});