$(document).ready(function(){
        $("#myToast").toast('show');
});


$(document).ready(function(){
        switch($_GET_PATH()){
                case 'convocation':
                        $('#navConv').addClass('active');
                        $('#dropdownConvocation').addClass('active');          
                        break;
                case 'rencontre':
                        $('#navRenc').addClass('active');
                        $('#dropdownRencontre').addClass('active');      
                        break;
                case 'absence':
                        $('#navAbs').addClass('active');
                        $('#dropdownAbsence').addClass('active');            
                        break;
                case 'connexion':
                        $('#navCon').addClass('active');
                        break;
                case 'effectif':
                        $('#navEff').addClass('active');
                        $('#dropdownEffectif').addClass('active');
                        break;
        }
      })
      
function $_GET_PATH() {
        var path = window.location.href.split("/");
        return path[4] ? path[4] : null;
}