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

window.onload = function(){
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("loginBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    
    // var form = document.getElementById("loginFrm");
    // function handleForm(event) { event.preventDefault(); } 
    // form.addEventListener('submit', handleForm);
}

