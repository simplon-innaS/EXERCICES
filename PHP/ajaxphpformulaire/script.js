//lorsque tout est chargé jusqu'au bout
$(document).ready(function(){
  //lorque ca à été submité dans le id form
  $("#form").submit(function(){
    //l'equivalent du XMLHttpRequest.... en js
    $.ajax({
      type : 'POST',
      url : 'http://localhost/ajaxformulaire/mail.php',
      //on recupere toutes le contenu du formulaire
      data : $(this).serialize()
      //si c'est tout ok alors on envoi ce message à l'utilisateur
    }).done(function(){
      alert('Merci davoir rempli le formulaire, nous vous re-contacterons');
    });
    return false;
})
});
