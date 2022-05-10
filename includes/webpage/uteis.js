function verificar(ev){
    let qual = ev.target;
    let msg = qual.text;
    console.log(msg);

    if(confirm("Tem a certeza que quer eliminar esta musica?!")){
        return true;
    }
    else{
        return false;
    }
}
