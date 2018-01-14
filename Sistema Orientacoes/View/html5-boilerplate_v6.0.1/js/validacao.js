window.onload = init;

function init(){
    var areaSenha = document.getElementById("formSenha");
    var areaRedigiteSenha = document.getElementById("formRedigiteSenha");
    setListeners(areaSenha,areaRedigiteSenha);    
}

function setListeners(areaSenha,areaRedigiteSenha) {
    //verifico segurança da senha
    var editTextSenha = document.getElementById("senha");
    var editTextRedigiteSenha = document.getElementById("redigiteSenha");
    editTextSenha.addEventListener("keyup",function(){
        var senha = editTextSenha.value;        
        var tam = senha.length;    
        var classe = "";
        if(tam < 4){
            classe = "has-error";
        } else if((tam > 4) && (tam < 8)){
            classe = "has-warning";
        } else{
            classe = "has-success";
        }
        var oldClass = "form-group";
        areaSenha.setAttribute("class",oldClass+" "+classe);
    });

    //verifico se senha são iguais
    editTextRedigiteSenha.addEventListener("keyup",function(){
        var senha = editTextSenha.value;
        var senhaRedigitada = editTextRedigiteSenha.value;
        var classe = "";
        if(senha != senhaRedigitada){
            classe = "has-error";
        } else{
            classe = "has-success";
        }
        
        var oldClass = "form-group";
        areaRedigiteSenha.setAttribute("class",oldClass+" "+classe);
    });    
}